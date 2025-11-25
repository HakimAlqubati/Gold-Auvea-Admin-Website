<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Design;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * عرض صفحة السلة
     */
    public function index()
    {
        $cart = $this->getOrCreateCart();
        $cart->load('items.design.category');

        return view('pages.cart', [
            'cart' => $cart,
            'items' => $cart->items,
            'total' => $cart->total,
            'itemsCount' => $cart->items_count,
        ]);
    }

    /**
     * الحصول على السلة الحالية (للمستخدم أو الجلسة)
     */
    private function getOrCreateCart()
    {
        if (Auth::check()) {
            // مستخدم مسجل
            return Cart::firstOrCreate(
                ['user_id' => Auth::id(), 'status' => 'active'],
                ['session_id' => null]
            );
        } else {
            // زائر (استخدام session)
            $sessionId = session()->getId();
            return Cart::firstOrCreate(
                ['session_id' => $sessionId, 'status' => 'active'],
                ['user_id' => null]
            );
        }
    }

    /**
     * إضافة عنصر إلى السلة
     */
    public function add(Request $request)
    {
        $request->validate([
            'design_id' => 'required|exists:designs,id',
            'quantity' => 'integer|min:1',
        ]);

        $cart = $this->getOrCreateCart();
        $design = Design::findOrFail($request->design_id);

        // التحقق إذا كان العنصر موجود مسبقاً في السلة
        $cartItem = $cart->items()->where('design_id', $design->id)->first();

        if ($cartItem) {
            // العنصر موجود مسبقاً - لا نسمح بالإضافة مرة أخرى
            return response()->json([
                'success' => false,
                'already_in_cart' => true,
                'message' => __('header.cart_item_already_added'),
                'cart_count' => $cart->fresh()->items_count,
            ], 400);
        } else {
            // إضافة عنصر جديد
            $cart->items()->create([
                'design_id' => $design->id,
                'quantity' => $request->quantity ?? 1,
                'price' => $design->price ?? 0,
                'customization' => $request->customization ?? null,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => __('header.cart_item_added'),
            'cart_count' => $cart->fresh()->items_count,
        ]);
    }

    /**
     * تحديث كمية عنصر في السلة
     */
    public function update(Request $request, $itemId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = $this->getOrCreateCart();
        $cartItem = $cart->items()->findOrFail($itemId);

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json([
            'success' => true,
            'message' => __('header.cart_updated'),
            'cart_count' => $cart->fresh()->items_count,
        ]);
    }

    /**
     * حذف عنصر من السلة
     */
    public function remove($itemId)
    {
        $cart = $this->getOrCreateCart();
        $cartItem = $cart->items()->findOrFail($itemId);
        $cartItem->delete();

        return response()->json([
            'success' => true,
            'message' => __('header.cart_item_removed'),
            'cart_count' => $cart->fresh()->items_count,
        ]);
    }

    /**
     * إفراغ السلة بالكامل
     */
    public function clear()
    {
        $cart = $this->getOrCreateCart();
        $cart->items()->delete();

        return response()->json([
            'success' => true,
            'message' => __('header.cart_cleared'),
            'cart_count' => 0,
        ]);
    }

    /**
     * الحصول على محتويات السلة
     */
    public function getCart()
    {
        $cart = $this->getOrCreateCart();
        $cart->load('items.design');

        return response()->json([
            'success' => true,
            'cart' => $cart,
            'items' => $cart->items,
            'total' => $cart->total,
            'items_count' => $cart->items_count,
        ]);
    }

    /**
     * الحصول على عدد العناصر في السلة فقط
     */
    public function getCount()
    {
        $cart = $this->getOrCreateCart();

        return response()->json([
            'success' => true,
            'count' => $cart->items_count,
        ]);
    }

    /**
     * الحصول على قائمة معرفات التصاميم الموجودة في السلة
     */
    public function getCartItemIds()
    {
        $cart = $this->getOrCreateCart();
        $designIds = $cart->items()->pluck('design_id')->toArray();

        return response()->json([
            'success' => true,
            'design_ids' => $designIds,
        ]);
    }
}
