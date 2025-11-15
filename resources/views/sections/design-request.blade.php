 <section class="section section-request" id="request">
        <div class="section-inner page-container">
            <div class="section-title-wrap fade-in">
                <div class="section-kicker">Start Your Project</div>
                <h2 class="section-title">Request a 3D Design</h2>
                <div class="section-underline"></div>
            </div>

            <div class="request-grid">
                <div class="request-info fade-in">
                    <p>
                        Send us the details of the required design, and we will reply with pricing information and the
                        estimated delivery time. You can also attach photos of a similar model or a hand-drawing (which
                        will actually be sent via WhatsApp or the email you enter here).
                    </p>
                    <ul>
                        <li>Special designs for jewelry shops and workshops in Yemen.</li>
                        <li>Ability to keep your design confidential and not display it in the portfolio.</li>
                        <li>Delivery of STL / 3DM / OBJ files according to your preference.</li>
                    </ul>
                    <p class="form-note">
                        <strong>Note:</strong> This is a demo form within the site – image uploading and final
                        communication will be via the WhatsApp or email you enter here.
                    </p>
                </div>

                <form class="request-form fade-in"
                    onsubmit="event.preventDefault(); alert('This is a demo form. Connect it to your backend or WhatsApp link.');">
                    
                    {{-- إضافة حقل CSRF Token مطلوب في Laravel --}}
                    @csrf 

                    <div class="request-form-title">Tell Us About Your Design</div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-input" placeholder="Your name or shop name" name="full_name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">City in Yemen</label>
                            <input type="text" class="form-input" placeholder="Sana'a, Aden, Taiz, Ibb…" name="city">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">WhatsApp Number</label>
                            <input type="text" class="form-input" placeholder="+967 7XX XXX XXX" name="whatsapp">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Preferred Metal</label>
                            <select class="form-select" name="metal_type">
                                <option>Gold 18K</option>
                                <option>Gold 21K</option>
                                <option>Gold 22K</option>
                                <option>Gold 24K</option>
                                <option>Silver</option>
                                <option>Mixed / Not sure yet</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Design Type</label>
                        <input type="text" class="form-input"
                            placeholder="Ring, bridal set, name necklace, kids jewelry…" name="design_type">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Details</label>
                        <textarea class="form-textarea"
                            placeholder="Sizes, stones, approximate weight, special notes…" name="details"></textarea>
                    </div>

                    <button type="submit" class="btn-primary form-submit">Send 3D Design Request</button>
                </form>
            </div>
        </div>
    </section>