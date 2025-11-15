   <div class="top-ticker">
       <div class="top-ticker-left">
           <span class="phone">+967 777 000 000</span>
           <span>Design • Production • Delivery inside Yemen</span>
           <span class="region">Yemen – Sana'a • Aden • Taiz • Ibb</span>
       </div>
       <div class="top-ticker-right" id="metalTicker">
           <div class="metal-price">
               <span class="metal-label">GOLD</span>
               <span class="metal-value" data-base="4181.2">$4181.2</span>
               <span class="metal-change up">0.23% (9.51)</span>
           </div>
           <div class="metal-price">
               <span class="metal-label">SILVER</span>
               <span class="metal-value" data-base="52.4">$52.4</span>
               <span class="metal-change up">0.35% (0.18)</span>
           </div>
           <div class="metal-price">
               <span class="metal-label">PLATINUM</span>
               <span class="metal-value" data-base="1591.3">$1591.3</span>
               <span class="metal-change down">-0.12% (-2.1)</span>
           </div>
       </div>
   </div>

   <header class="main-header" id="mainHeader">
       <div class="main-header-inner">
           <div class="logo">
               {{-- التعديل هنا: استخدام دالة asset() --}}
               <img src="{{ asset('assets/auvea/logo.png') }}" width="60" alt="Auvea Logo">
               <div>
                   <span class="text-main">Auvea</span>
                   <span class="logo-sub">3D Gold & Jewelry Studio – Yemen</span>
               </div>
           </div>

           <nav class="header-nav">
               <a href="#collections" class="nav-link">3D Collections</a>
               <a href="#process" class="nav-link">Process</a>
               <a href="#request" class="nav-link">Request</a>
           </nav>
           <div class="header-icons">
               <button class="theme-toggle" id="themeToggle" aria-label="Toggle dark and light theme">☀️</button>
               <div class="header-icon-btn" title="Wishlist">♡</div>
               <div class="header-icon-btn" title="Account">👤</div>
               <div class="header-icon-btn" title="Cart">🛒</div>
           </div>
       </div>
   </header>
