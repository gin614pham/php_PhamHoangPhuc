<!-- Model create -->
 
<div class="modal fade" id="createMotelModal" tabindex="-1" aria-labelledby="createMotelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createMotelModalLabel">Tạo phòng trọ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('motels.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name_of_persion" class="form-label">Tên người thuê trọ</label>
                        <input type="text" class="form-control" id="name_of_persion" name="name_of_persion" pattern="^[a-zA-Z\s]{5,50}$" required>

                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Số điện thoại</label>
                        <input type="number" class="form-control" id="phone_number" name="phone_number" pattern="^\d{10}$" required>
                    </div>
                    <div class="mb-3">
                        <label for="check_in" class="form-label">Ngày bắt đầu</label>
                        <input type="date" class="form-control" id="check_in" name="check_in" required>
                        <script>
                            var today = new Date().toISOString().split('T')[0];
                            document.getElementsByName("check_in")[0].setAttribute('min', today);
                        </script>
                    </div>
                    <div class="mb-3">
                        <label for="payment_method_id" class="form-label">Phương thức thanh toán</label>
                        <select class="form-select" id="payment_method_id" name="payment_method_id" required>
                            <option value="">Chọn phương thức thanh toán</option>
                            @foreach ($paymentMethods as $paymentMethod)
                                <option value="{{ $paymentMethod->id_payment_method }}">{{ $paymentMethod->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label">Ghi chú </label>
                        <textarea class="form-control" id="note" name="note"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



<!-- Model create end -->