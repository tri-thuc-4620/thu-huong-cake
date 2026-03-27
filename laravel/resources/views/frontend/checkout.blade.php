@extends('frontend.layouts.app')

@section('title', 'Thanh Toán Đơn Hàng - Thu Hường Cake')

@section('content')
    <!-- Checkout Page -->
    <section class="checkout-page">
        <div class="container">
            <h1 class="checkout-title">Thanh toán đơn hàng</h1>

            <div class="checkout-layout">

                <!-- Left: Form -->
                <div class="checkout-form">

                    <!-- Thong tin nguoi dat -->
                    <div class="checkout-card">
                        <h2 class="checkout-card-title">
                            <i class="fas fa-user-circle"></i> Thông tin người đặt
                        </h2>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Họ và tên *</label>
                                <input type="text" placeholder="Nguyễn Văn A">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại *</label>
                                <input type="tel" placeholder="0912...">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Thời gian nhận bánh *</label>
                            <input type="datetime-local">
                        </div>

                        <div class="form-group">
                            <label>Ghi chú đơn hàng</label>
                            <textarea rows="3" placeholder="Viết lời chúc lên bánh, ít ngọt..."></textarea>
                        </div>

                        <label class="checkbox-label" id="giftToggle">
                            <input type="checkbox" id="giftCheckbox">
                            <i class="fas fa-gift"></i>
                            <span>Đặt bánh làm quà tặng</span>
                        </label>

                        <!-- Form nguoi nhan (an/hien) -->
                        <div class="gift-form" id="giftForm">
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Tên người nhận *</label>
                                    <input type="text" placeholder="Nguyễn Văn B">
                                </div>
                                <div class="form-group">
                                    <label>SĐT người nhận *</label>
                                    <input type="tel" placeholder="0987...">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hinh thuc nhan hang -->
                    <div class="checkout-card">
                        <h2 class="checkout-card-title">
                            <i class="fas fa-map-marker-alt"></i> Hình thức nhận hàng
                        </h2>

                        <div class="delivery-tabs">
                            <button class="delivery-tab active" data-delivery="ship" onclick="switchDelivery('ship', this)">
                                <i class="fas fa-shipping-fast"></i>
                                <span>Giao tận nơi</span>
                            </button>
                            <button class="delivery-tab" data-delivery="pickup" onclick="switchDelivery('pickup', this)">
                                <i class="fas fa-store"></i>
                                <span>Nhận tại cửa hàng</span>
                            </button>
                        </div>

                        <!-- Giao tan noi -->
                        <div class="delivery-panel active" id="delivery-ship">
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Thành Phố</label>
                                    <select>
                                        <option>Hà Nội</option>
                                        <option>TP Hồ Chí Minh</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Quận/Huyện</label>
                                    <select>
                                        <option>Chọn Quận/Huyện</option>
                                        <option>Cầu Giấy</option>
                                        <option>Đống Đa</option>
                                        <option>Thanh Xuân</option>
                                        <option>Hà Đông</option>
                                        <option>Hai Bà Trưng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Phường/Xã</label>
                                    <select>
                                        <option>Chọn Phường/Xã</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ cụ thể (Số nhà, ngõ...)</label>
                                    <input type="text" placeholder="Số 10, ngách 5...">
                                </div>
                            </div>
                        </div>

                        <!-- Nhan tai cua hang -->
                        <div class="delivery-panel" id="delivery-pickup">
                            <p class="pickup-label">Chọn cửa hàng gần bạn nhất:</p>
                            <div class="store-list">
                                <label class="store-option active">
                                    <input type="radio" name="store" checked>
                                    <span>Cơ sở 11a Dịch Vọng, Cầu Giấy, Hà Nội</span>
                                </label>
                                <label class="store-option">
                                    <input type="radio" name="store">
                                    <span>Cơ sở 22 Quan Nhân, Thanh Xuân, Hà Nội</span>
                                </label>
                                <label class="store-option">
                                    <input type="radio" name="store">
                                    <span>Cơ sở 74 Tôn Thất Tùng, Đống Đa, Hà Nội</span>
                                </label>
                                <label class="store-option">
                                    <input type="radio" name="store">
                                    <span>Cơ sở 102 Nguyễn Trãi, Quận 1, TP.HCM</span>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right: Order Summary -->
                <div class="checkout-summary">
                    <div class="checkout-card summary-card">
                        <h2 class="checkout-card-title">Đơn hàng của bạn</h2>

                        <!-- Cart Item -->
                        <div class="summary-item">
                            <div class="summary-item-img">
                                <img src="{{ asset('frontend/image_san_pham/Banh-kem-mini-mau-hong-dep-nhat-5.jpg') }}" alt="Bánh kem">
                            </div>
                            <div class="summary-item-info">
                                <h4>Bánh Kem Sinh Nhật Dâu Tây Premium</h4>
                                <span class="summary-item-qty">x1</span>
                            </div>
                            <span class="summary-item-price">450.000d</span>
                        </div>

                        <div class="summary-divider"></div>

                        <!-- Totals -->
                        <div class="summary-row">
                            <span>Tạm tính</span>
                            <span>450.000d</span>
                        </div>
                        <div class="summary-row">
                            <span>Phí vận chuyển</span>
                            <span id="shippingFee">30.000d</span>
                        </div>

                        <div class="summary-divider"></div>

                        <div class="summary-row summary-total">
                            <span>Tổng cộng</span>
                            <span id="totalPrice">480.000d</span>
                        </div>

                        <!-- Phuong thuc thanh toan -->
                        <h3 class="payment-title">Phương thức thanh toán</h3>

                        <label class="payment-option active">
                            <input type="radio" name="payment" checked>
                            <div class="payment-info">
                                <div class="payment-name">
                                    <i class="fas fa-university"></i>
                                    <strong>Chuyển khoản ngân hàng</strong>
                                </div>
                                <span class="payment-desc">Quét mã QR để thanh toán nhanh chóng</span>
                            </div>
                        </label>

                        <label class="payment-option">
                            <input type="radio" name="payment">
                            <div class="payment-info">
                                <div class="payment-name">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <strong>Thanh toán khi nhận hàng</strong>
                                </div>
                                <span class="payment-desc">Thanh toán tiền mặt cho shipper</span>
                            </div>
                        </label>

                        <!-- Order Button -->
                        <button class="btn-checkout">
                            Đặt Hàng Ngay (<span id="checkoutTotal">480.000d</span>)
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Switch delivery method
    function switchDelivery(type, btn) {
        document.querySelectorAll('.delivery-tab').forEach(t => t.classList.remove('active'));
        btn.classList.add('active');
        document.querySelectorAll('.delivery-panel').forEach(p => p.classList.remove('active'));
        document.getElementById('delivery-' + type).classList.add('active');

        // Update shipping fee
        const feeEl = document.getElementById('shippingFee');
        const totalEl = document.getElementById('totalPrice');
        const checkoutEl = document.getElementById('checkoutTotal');
        if (type === 'pickup') {
            feeEl.innerHTML = '<span style="color:#27ae60">Miễn phí</span>';
            totalEl.textContent = '450.000d';
            checkoutEl.textContent = '450.000d';
        } else {
            feeEl.textContent = '30.000d';
            totalEl.textContent = '480.000d';
            checkoutEl.textContent = '480.000d';
        }
    }

    // Payment option toggle
    document.querySelectorAll('.payment-option').forEach(opt => {
        opt.addEventListener('click', () => {
            document.querySelectorAll('.payment-option').forEach(o => o.classList.remove('active'));
            opt.classList.add('active');
            opt.querySelector('input').checked = true;
        });
    });

    // Store option toggle
    document.querySelectorAll('.store-option').forEach(opt => {
        opt.addEventListener('click', () => {
            document.querySelectorAll('.store-option').forEach(o => o.classList.remove('active'));
            opt.classList.add('active');
        });
    });

    // Gift form toggle
    document.getElementById('giftCheckbox').addEventListener('change', function() {
        document.getElementById('giftForm').classList.toggle('active', this.checked);
    });
</script>
@endpush
