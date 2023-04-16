@extends('masterLayout.client.masterClientHome2')
@section('contentName')
@foreach ($banner as $br)
@if($br->active == 16)
<div id="title" class="page-title" style="background-image: url({{asset( $br->anhBanner )}});">
        <div class="section-container">
            <div class="content-title-heading">
                <h1 class="text-title-heading">
                    Các Câu Hỏi Thường Gặp
                </h1>
            </div>
            <div class="breadcrumbs">
                <a href="index.html">Trang chủ</a><span class="delimiter"></span>Câu hỏi
            </div>
        </div>
    </div>
@endif
@endforeach
@endsection

@section('contentMain')
	<div id="content" class="site-content" role="main">
		<div class="section-padding">
			<div class="section-container p-l-r">
				<div class="page-faq">
					<div class="row">
						<div class="col-md-6">
							<div class="faq-section">
								<div class="section-title">
									<h2>01. Đơn đặt hàng</h2>
								</div>
								<div class="section-content">
									<div class="faq-item">
										<div class="faq-question">
											Khi nào tôi nhận được đơn đặt hàng của mình?
										</div>
										<div class="faq-answer">
											Khi đặt hàng, một ngày giao hàng được chỉ định. Sau khi đơn đặt hàng đã được đặt, thời gian giao hàng tương tự cũng sẽ được nêu trong xác nhận đơn hàng. Do đó, không bao giờ có thể xảy ra trường hợp trong quá trình đặt hàng, ngày giao hàng trên trang web khác với trên xác nhận đơn hàng.
										</div>
									</div>
									<div class="faq-item">
										<div class="faq-question">
											Bây giờ tôi thấy thời gian giao hàng (một phần) của đơn đặt hàng của tôi lâu hơn. Làm thế nào tôi có thể hủy bỏ nó?
										</div>
										<div class="faq-answer">
											Nếu đơn đặt hàng có thời gian giao hàng lâu hơn bạn đã thấy trước đây, tất nhiên là có thể hủy (một phần) đơn đặt hàng. Đối với điều này, bạn có thể liên hệ với dịch vụ khách hàng của chúng tôi. Họ sẽ hủy đơn hàng cho bạn. Số tiền mua hàng sẽ được trả lại vào tài khoản ngân hàng của bạn trong vòng hai ngày làm việc. Khi một đơn đặt hàng đã được vận chuyển, nó không còn có thể bị hủy bỏ.
										</div>
									</div>
									<div class="faq-item">
										<div class="faq-question">
											Khi nào tôi sẽ nhận được hóa đơn cho đơn hàng của mình?
										</div>
										<div class="faq-answer">
											Khi bạn đã thanh toán cho đơn hàng, bạn sẽ không tự động nhận được hóa đơn cho đơn hàng của mình. Nếu bạn muốn nhận hóa đơn, điều này có thể được thực hiện theo hai cách. Cách thứ nhất là thông qua tài khoản của bạn tại cửa hàng của chúng tôi. Khi bạn đăng nhập vào tài khoản của mình, bạn có thể xem các đơn đặt hàng của mình và tải xuống hóa đơn.
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="faq-section">
								<div class="section-title">
									<h2>02. Lô hàng</h2>
								</div>
								<div class="section-content">
									<div class="faq-item">
										<div class="faq-question">
											Khi nào tôi nhận được đơn đặt hàng của mình?
										</div>
										<div class="faq-answer">
											Khi đặt hàng, một ngày giao hàng được chỉ định. Sau khi đơn đặt hàng đã được đặt, thời gian giao hàng tương tự cũng sẽ được nêu trong xác nhận đơn hàng. Do đó, không bao giờ có thể xảy ra trường hợp trong quá trình đặt hàng, ngày giao hàng trên trang web khác với trên xác nhận đơn hàng.
										</div>
									</div>
									<div class="faq-item">
										<div class="faq-question">
											Bây giờ tôi thấy thời gian giao hàng (một phần) của đơn đặt hàng của tôi lâu hơn. Làm thế nào tôi có thể hủy bỏ nó?
										</div>
										<div class="faq-answer">
											Nếu đơn đặt hàng có thời gian giao hàng lâu hơn bạn đã thấy trước đây, tất nhiên là có thể hủy (một phần) đơn đặt hàng. Đối với điều này, bạn có thể liên hệ với dịch vụ khách hàng của chúng tôi. Họ sẽ hủy đơn hàng cho bạn. Số tiền mua hàng sẽ được trả lại vào tài khoản ngân hàng của bạn trong vòng hai ngày làm việc. Khi một đơn đặt hàng đã được vận chuyển, nó không còn có thể bị hủy bỏ.
										</div>
									</div>
									<div class="faq-item">
										<div class="faq-question">
											Khi nào tôi sẽ nhận được hóa đơn cho đơn hàng của mình?
										</div>
										<div class="faq-answer">
											Khi bạn đã thanh toán cho đơn hàng, bạn sẽ không tự động nhận được hóa đơn cho đơn hàng của mình. Nếu bạn muốn nhận hóa đơn, điều này có thể được thực hiện theo hai cách. Cách thứ nhất là thông qua tài khoản của bạn tại cửa hàng của chúng tôi. Khi bạn đăng nhập vào tài khoản của mình, bạn có thể xem các đơn đặt hàng của mình và tải xuống hóa đơn.
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="faq-section">
								<div class="section-title">
									<h2>03. Thứ tự</h2>
								</div>
								<div class="section-content">
									<div class="faq-item">
										<div class="faq-question">
											Khi nào tôi nhận được đơn đặt hàng của mình?
										</div>
										<div class="faq-answer">
											Khi đặt hàng, một ngày giao hàng được chỉ định. Sau khi đơn đặt hàng đã được đặt, thời gian giao hàng tương tự cũng sẽ được nêu trong xác nhận đơn hàng. Do đó, không bao giờ có thể xảy ra trường hợp trong quá trình đặt hàng, ngày giao hàng trên trang web khác với trên xác nhận đơn hàng.
										</div>
									</div>
									<div class="faq-item">
										<div class="faq-question">
											Bây giờ tôi thấy thời gian giao hàng (một phần) của đơn đặt hàng của tôi lâu hơn. Làm thế nào tôi có thể hủy bỏ nó?
										</div>
										<div class="faq-answer">
											Nếu đơn đặt hàng có thời gian giao hàng lâu hơn bạn đã thấy trước đây, tất nhiên là có thể hủy (một phần) đơn đặt hàng. Đối với điều này, bạn có thể liên hệ với dịch vụ khách hàng của chúng tôi. Họ sẽ hủy đơn hàng cho bạn. Số tiền mua hàng sẽ được trả lại vào tài khoản ngân hàng của bạn trong vòng hai ngày làm việc. Khi một đơn đặt hàng đã được vận chuyển, nó không còn có thể bị hủy bỏ.
										</div>
									</div>
									<div class="faq-item">
										<div class="faq-question">
											Khi nào tôi sẽ nhận được hóa đơn cho đơn hàng của mình?
										</div>
										<div class="faq-answer">
											Khi bạn đã thanh toán cho đơn hàng, bạn sẽ không tự động nhận được hóa đơn cho đơn hàng của mình. Nếu bạn muốn nhận hóa đơn, điều này có thể được thực hiện theo hai cách. Cách thứ nhất là thông qua tài khoản của bạn tại cửa hàng của chúng tôi. Khi bạn đăng nhập vào tài khoản của mình, bạn có thể xem các đơn đặt hàng của mình và tải xuống hóa đơn.
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="faq-section">
								<div class="section-title">
									<h2>04. Trả hàng, đổi hàng, khiếu nại</h2>
								</div>
								<div class="section-content">
									<div class="faq-item">
										<div class="faq-question">
											Khi nào tôi nhận được đơn đặt hàng của mình?
										</div>
										<div class="faq-answer">
											Khi đặt hàng, một ngày giao hàng được chỉ định. Sau khi đơn đặt hàng đã được đặt, thời gian giao hàng tương tự cũng sẽ được nêu trong xác nhận đơn hàng. Do đó, không bao giờ có thể xảy ra trường hợp trong quá trình đặt hàng, ngày giao hàng trên trang web khác với trên xác nhận đơn hàng.
										</div>
									</div>
									<div class="faq-item">
										<div class="faq-question">
											Bây giờ tôi thấy thời gian giao hàng (một phần) của đơn đặt hàng của tôi lâu hơn. Làm thế nào tôi có thể hủy bỏ nó?
										</div>
										<div class="faq-answer">
											If the order has a longer delivery time than you had previously seen, it is of course possible to cancel (a part of) the order. For this you can contact our customer service. They will cancel the order for you. The purchase amount will be back on your bank account within two working days. When an order has already been shipped, it can no longer be cancelled.
										</div>
									</div>
									<div class="faq-item">
										<div class="faq-question">
											Khi nào tôi sẽ nhận được hóa đơn cho đơn hàng của mình?
										</div>
										<div class="faq-answer">
											Khi bạn đã thanh toán cho đơn hàng, bạn sẽ không tự động nhận được hóa đơn cho đơn hàng của mình. Nếu bạn muốn nhận hóa đơn, điều này có thể được thực hiện theo hai cách. Cách thứ nhất là thông qua tài khoản của bạn tại cửa hàng của chúng tôi. Khi bạn đăng nhập vào tài khoản của mình, bạn có thể xem các đơn đặt hàng của mình và tải xuống hóa đơn.
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- #content -->
@endsection
