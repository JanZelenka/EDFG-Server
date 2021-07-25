<?php
/**
 * @var \CodeIgniter\View\View $this
 * @var array $courseGroups
 */

$blnVoucherMatched = false;
?>
<?= $this->extend( 'Layouts/default' ) ?>
<?= $this->section( 'styles' )?>
<link rel="stylesheet" href="http://www.x3dom.org/download/dev/x3dom.css">
<?= $this->endSection() ?>
<?= $this->section( 'dialogs' ) ?>

<!-- Invoice Booking confirmation -->
<div
		id="invoiceBookingConfirmation"
		class="modal"
		tabindex="-1"
		role="dialog"
		>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?= lang( 'Course.invoiceBookingConfermationTitle' ) ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><?= lang( 'Course.invoiceBookingConfermationMessage' ) ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= lang( 'Generic.No' ) ?></button>
        <button
        		id="invoiceBookingConfirm"
        		type="button"
        		class="btn btn-primary-nexus"
        		><?= lang( 'Generic.Yes' ) ?></button>
      </div>
    </div>
  </div>
</div>

<!-- Voucher popover form -->
<div
		style="display:none;"
		>
	<div id="voucherPopoverForm">
		<?= form_open( base_url( 'courses/voucher' ) ) ?>
			<input
					class="form-control"
					name="VoucherCode"
					type="text"
					value="<?= ( isset( $Invoice ) ? $Invoice->VoucherCode : '' ) ?>"
					/>
			<input
					class="btn float-right btn-primary-nexus mt-2 mb-2"
					type="submit"
					value="<?= lang( 'Generic.confirm' ) ?>"
					/>
		<?= form_close() ?>
	</div>
</div>
<?= $this->endSection() ?>
<?= $this->section('main') ?><?php
if ( isset( $validation ) ) :?>
<div
		id="errorAlert"
		class="alert alert-danger alert-dismissible fade show"
		role="alert"
		>
<?= $validation->listErrors() ?>
</div><?php
endif;?>
<div class="body"><?php
if ( empty( $courseGroups ) ):?>
	<div
			class="alert alert-warning"
			role="alert"
			><?= lang( 'Messages.noCoursesFound' ) ?></div>
<?php
else:?><?php
	/**
	 * @var \App\Entities\Person $Participant
	 * @var \App\Entities\Person $User
	 * @var \App\Entities\Course $Course
	 * @var \App\Entities\Invoice $Invoice
	 * @var array $participants
	 */ ?>
	<nav
			id="invoice"
			class="navbar navbar-expand navbar-light sticky-top actionBar d-flex justify-content-end dynamicObject"
			data-set="<?= isset( $Invoice->__id ) && ! empty( $Invoice->InvoiceLineCount_cu ) ? 'true' : 'false' ?>"
			>
		<a
			tabindex="0"
			class="btn btn-primary-nexus mr-auto dynamicData"
			role="button"
			data-toggle="popover"
			title="<?= lang( 'Course.voucher') ?>"
			data-content=""
			data-html='true'
			data-popover-content="#voucherPopoverForm"
			data-placement="bottom"
			href="#"
			><?= lang( 'Course.haveVoucher') ?></a>
		<div class="ml-3"><?= lang( 'Course.yourTotalPrice' ) ?>: €
			<span
					class="ml-3"
					id="invoiceTotal"
				><?= isset( $Invoice->__id ) ? $Invoice->zzcAmount : '0' ?></span>
		</div>
		<a
				id="bookInvoice"
				role="button"
				class="btn btn-primary-nexus dynamicData ml-3"
				href="<?= base_url( '/courses/confirm') ?>"
				><?= lang( 'Course.bookInvoice' ) ?></a>
	</nav><?php

	if ( empty( $Participant->_FUNid ) ):?>
	<!-- Function missing in user profile -->
	<div
			class="alert alert-warning"
			role="alert"
			><?= sprintf( lang( 'Messages.noPersonFunctionSpecified' ), base_url( 'person/profile') . '/' . $Participant->fmMetaData()->recordId ) ?></div><?php
	endif;?>


	<!-- Error message -->
	<div
			id="errorAlert"
			class="alert alert-danger alert-dismissible fade show sticky-top dynamicAlert"
			role="alert"
			>
		<h4 id="errorTitle"></h4>
		<p id="errorMessage"></p>
		<hr>
		<p><?= lang( 'Errors.errorCode' ) ?>: <span id="errorCode"></span></p>
		<p><?= lang( 'Errors.errorDescription' ) ?>: <span id="errorDescription"></span></p>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<!-- Invoice Booking success alert -->
	<div
			id="invoiceBookingSuccessAlert"
			class="alert alert-success alert-dismissible fade show sticky-top dynamicAlert"
			role="alert"
			>
		<?= lang( 'Course.invoiceBookingSuccess' ) ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<!-- Invoice Booking failure alert -->
	<div
			id="invoiceBookingFailureAlert"
			class="alert alert-danger alert-dismissible fade show sticky-top dynamicAlert"
			role="alert"
			>
		<?= lang( 'Course.invoiceBookingFailure' ) ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div><?php

	foreach ( $courseGroups as $CourseGroup ):?>
	<div class="card rounded-0 mb-3">
		<div class="card-header mainCardHeader rounded-0"><?= $CourseGroup->name ?></div>
		<div class="card-body rounded-0"><?php
		if ( ! empty( $CourseGroup->reductionDescription ) ):?>
			<p class="mb-3"><?= $CourseGroup->reductionDescription ?></p><?php
		endif;

		$intCourseTypeIndex = 0;
		$intCourseTypeLast = count( $CourseGroup->courseTypes ) - 1;

		foreach ( $CourseGroup->courseTypes as $CourseType ):?>
			<div class="card rounded-0<?= ( $intCourseTypeIndex !== $intCourseTypeLast ? ' mb-3' : '' ) ?>">
				<div class="card-header text-white bg-secondary rounded-0"><?= $CourseType->name ?></div>
				<div class="card-body rounded-0"><?php
			$intCourseIndex = 0;
			$intCourseLast = count( $CourseType->courses ) - 1;

			foreach ( $CourseType->courses as $Course ):?>
					<div
							class="card bg-light rounded-0 course dynamicObject<?= ( $intCourseIndex !== $intCourseLast ? ' mb-3' : '' ) ?>"
							data-set="<?= empty( $Course->{'COU_ILI~participant::_recordId'} ) ? 'false' : 'true' ?>"
							data-type="_COUid"
							data-type-id="<?= $Course->__id ?>"
							data-record-id="<?= $Course->{'COU_ILI~participant::_recordId'} ?>"
							data-invoiceline-__id="<?= $Course->{'COU_ILI~participant::__id'} ?>"
							>
						<div class="card-header d-flex selectableTitle">
							<div class="p-2 iconCheckBox">
								<svg
										class="bi bi-check-square iconChecked"
										data-context="Course"
										width="1.5em"
										height="1.5em"
										viewBox="0 0 16 16"
										fill="currentColor"
										xmlns="http://www.w3.org/2000/svg"
										>
									<path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
									<path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
								</svg>
								<svg
										class="bi bi-square iconUnchecked"
										data-context="Course"
										width="1.5em"
										height="1.5em"
										viewBox="0 0 16 16"
										fill="currentColor"
										xmlns="http://www.w3.org/2000/svg"
										>
									<path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
								</svg>
							</div>
							<div class="p-2 flex-grow-1 ml-3"><?= $Course->DateStart_Title_cs ?><?php ?> - €<?= $Course->Price ?></div>
							<div class="p-2 form-inline">
								<span class="dynamicData"><?= lang( 'Course.yourTotalPrice' ) ?>: €<span
										class="ml-3"
										data-type="_COUid"
										data-type-id="<?= $Course->__id ?>"
										data-field="zzcLineTotal"
										><?= $Course->{'COU_ILI~participant::zzcLineTotal'} ?></span></span>
							</div>
						</div><?php

					if (
							isset( $Invoice )
							 &&
							$Invoice->_COUid_VoucherGroupLowestAmount_cu === $Course->__id
							):?><?php
						$blnVoucherMatched = true;?>
						<?= $this->include( 'Courses/voucher_discount_info' ) ?><?php
					endif;

					if ( ! empty( $Course->Description ) ):?>
						<p class="card-text"><?= $Course->Description ?></p><?php
					endif;

					if ( count( $Course->portal( 'Items' ) ) ):?>
						<div class="card-body container courseSettings pl-3 pr-3">
							<div class="row"><?php

						foreach ($Course->portal( 'Items' ) as $CourseItem ):?>
								<div class="col-12 col-md-6 col-lg-4">
									<div
											class="card rounded-0 courseItem dynamicObject"
											data-set="<?= empty( $CourseItem[ 'COU_CIT_ILI~participant::_recordId'] ) ? 'false' : 'true' ?>"
											data-type="_CITid"
											data-type-id="<?= $CourseItem[ 'COU_CIT::__id' ] ?>"
											data-record-id="<?= $CourseItem[ 'COU_CIT_ILI~participant::_recordId'] ?>"
											data-invoiceline-__id="<?= $CourseItem[ 'COU_CIT_ILI~participant::__id'] ?>"
											>
										<div class="card-header text-dark bg-white selectableTitle">
											<span class="iconCheckBox mr-3">
												<svg
														class="bi bi-check-square iconChecked"
														data-context="CourseItem"
														width="1.5em"
														height="1.5em"
														viewBox="0 0 16 16"
														fill="currentColor"
														xmlns="http://www.w3.org/2000/svg"
														>
													<path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
													<path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
												</svg>
												<svg
														class="bi bi-square iconUnchecked"
														data-context="CourseItem"
														width="1.5em"
														height="1.5em"
														viewBox="0 0 16 16"
														fill="currentColor"
														xmlns="http://www.w3.org/2000/svg"
														>
													<path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
												</svg>
											</span>
											<span><?= $CourseItem[ 'COU_CIT::Name' ] ?></span>
										</div>
										<div class="card-body">
											<p class="card-text"><?= lang( 'Course.itemPrice' ) ?>: € <?= $CourseItem[ 'COU_CIT::Cost' ] ?></p>
											<p class="card-text dynamicData"><?= lang( 'Course.yourPrice' ) ?>: € <span
														class="ml-3"
														data-type="_CITid"
														data-type-id="<?= $CourseItem[ 'COU_CIT::__id' ] ?>"
														data-field="zzcLineTotal"
														><?= $CourseItem[ 'COU_CIT_ILI~participant::zzcLineTotal' ] ?></span></p>
										</div>
									</div>
								</div><?php
						endforeach;?>
							</div>
						</div><?php
					endif;?>
					</div><?php

				$intCourseIndex++;
			endforeach;?>
				</div>
			</div><?php

			$intCourseTypeIndex++;
		endforeach;?>
		</div>
	</div><?php
	endforeach;?><?php
endif;?>
</div><?php

if ( ! $blnVoucherMatched ):?>
<?= $this->include( 'Courses/voucher_discount_info' ) ?><?php
endif;?>
<?= $this->endSection() ?>

<?= $this->section( 'scripts' ) ?>
<script src="http://www.x3dom.org/download/dev/x3dom.js"></script>

<script type="text/javascript" title="Course list">
function showError (
		strMessage = '<?= lang( 'Errors.unknownErrorMessage') ?>'
		, strDescription = ''
		, strCode = ''
		, strTitle = '<?= lang( 'Errors.unknownErrorTitle') ?>'
		)
{
	$( '#errorTitle' ).html( strTitle );
	$( '#errorMessage' ).html( strMessage );
	$( '#errorDescription' ).html( strDescription );
	$( '#errorCode' ).html( strCode );
	$( '#errorAlert' ).css( 'display', 'block' );
}

async function toggleRegistered () {
	const elmClicked = $( this ).parent();
	const blnRegister = ( elmClicked.attr( 'data-set' ) !== 'true' );
	const strType = elmClicked.attr( 'data-type' );

	const objData = axios.create(
			{
				baseURL: "<?= base_url( 'courses/invoiceline' ) ?>"
				, headers: {
					"X-Requested-With": "XMLHttpRequest"
					, Accept: "application/json"
					}
				}
			);

	const jsnConfig = (
			blnRegister
			? {
				method: "post"
				, data: {
					InvoiceLine: {
						[ strType ]: elmClicked.attr( 'data-type-id' )
						}
					}
				}
			: {
				method: "delete"
				, url: "/" + elmClicked.attr( 'data-invoiceline-__id' )
				}
			);
	var objResponse;

	try {
		objResponse = await objData.request( jsnConfig );
	}
	catch ( error ) {
		console.error( error );
		var strErrorMessage = '<?= lang( 'Errors.registrationFailed') ?>';

		if ( error.hasOwnProperty( 'response' ) ) {
			showError(
					strErrorMessage
					, error.response.data.message
					, error.response.data.code
					, error.response.data.title
					);
		} else {
			showError(
					strErrorMessage
					, error.message
					);
		}

		return;
	}

	if ( objResponse.data.hasOwnProperty( 'Invoice' ) ) {
		// Modifying the Invoice Total and other controls
		const elmInvoiceTotal = $( '#invoiceTotal' );

		if ( objResponse.data.Invoice.data.InvoiceLineCount === '0' ) {
			elmInvoiceTotal.text( '0' );
			elmInvoiceTotal.parents( '.dynamicObject' ).attr( 'data-set', 'false' );
		} else {
			elmInvoiceTotal.text( objResponse.data.Invoice.data.zzcAmount );
			elmInvoiceTotal.parents( '.dynamicObject' ).attr( 'data-set', 'true' );
		}

		// Adjusting the voucher discount info.
		var elmVoucherDiscountInfo = $( '#voucherDiscountInfo' );

		if ( objResponse.data.Invoice._COUid_VoucherGroupLowestAmount_cu === '' ) {
			elmVoucherDiscountInfo.css( 'display', 'none' );
		} else {
			const elmCourseWithDiscount = $( '.course[data-type-id="' + objResponse.data.Invoice.data._COUid_VoucherGroupLowestAmount_cu + '"]' );

			if ( typeof elmCourseWithDiscount !== 'undefined') {
				elmVoucherDiscountInfo = elmVoucherDiscountInfo.detach();
				elmCourseWithDiscount.children( '.card-header' ).after( elmVoucherDiscountInfo );
				$( '#voucherCode' ).text( objResponse.data.Invoice.data.VoucherCode );
				$( '#voucherDiscount' ).text( objResponse.data.Invoice.data.VoucherDiscount_cu );
				elmVoucherDiscountInfo.css( 'display', 'block' );
			} else {
				elmVoucherDiscountInfo.css( 'display', 'none !important' );
			}
		}
	}

	elmClicked.attr( 'data-record-id', '' );

	if ( objResponse.data.hasOwnProperty( 'InvoiceLines' ) ) {
		var strDataType;
		var intDataTypeId;

		for (
				var intInvoiceLineIndex = 0
				; intInvoiceLineIndex !== objResponse.data.InvoiceLines.length
				; intInvoiceLineIndex++
				)
		{
			var objInvoiceLine = objResponse.data.InvoiceLines[ intInvoiceLineIndex ];

			if ( objInvoiceLine.data._CITid ) {
				strDataType = '_CITid';
				intDataTypeId = objInvoiceLine.data._CITid;
			} else {
				strDataType = '_COUid';
				intDataTypeId = objInvoiceLine.data._COUid;
			}

			$( '[data-type="' + strDataType + '"][data-type-id="' + intDataTypeId + '"][data-field="zzcLineTotal"]' ).text( objInvoiceLine.data.zzcLineTotal );
			$( '.dynamicObject[data-type="' + strDataType + '"][data-type-id="' + intDataTypeId + '"]' ).attr( 'data-invoiceline-__id', objInvoiceLine.data.__id );
		}
	}

	elmClicked.attr( 'data-set', blnRegister );

	if ( ! blnRegister ) {
		elmClicked.attr( 'data-record-id', blnRegister );
		const elmCourseItems = elmClicked.find( '.courseItem' );
		elmCourseItems.attr( 'data-set', blnRegister );
		elmCourseItems.attr( 'data-record-id', '' );
	}

	// Sliding the Course settings open/closed.
	const elmCourseSettings = elmClicked.find( '.courseSettings' );

	if ( typeof elmCourseSettings !== 'undefined' ) {
		elmCourseSettings.slideToggle( 'fast' );
	}
}

async function bookInvoice () {
	$( '#invoiceBookingConfirmation' ).modal( 'hide' );
	const objData = axios.create(
			{
				baseURL: "<?= base_url( 'courses/bookinvoice' ) ?>"
				, headers: {
						"X-Requested-With": "XMLHttpRequest"
						, Accept: "application/json"
						}
				}
			);
	var objResponse;

	try {
		objResponse = await objData.get();
	}
	catch ( error ) {
		console.error( error );
		$( '#invoiceBookingFailureAlert' ).css( 'display', 'block' );
		return;
	}

	$( '.dynamicObject' ).attr( 'data-set', 'false' );
	$( '[data-field="zzcLineTotal"]' ).text( '0' );
	$( '#invoiceTotal' ).text( '0' );
	$( '#invoiceBookingSuccessAlert' ).css( 'display', 'block' );
}<?php

if ( ! empty( $Participant->_FUNid ) ):?>

$( document ).ready( function () {
	// Making Course Titles clickable.
	$( '.selectableTitle' ).click( toggleRegistered );
//	$( '#bookInvoice' ).click( function () { $( '#invoiceBookingConfirmation' ).modal(); } );
//	$( '#invoiceBookingConfirm' ).click ( bookInvoice );

	// Showing up Settings sections of all selected courses
	const elmSelectedCoursesSettings = $( '.course[data-set="true"]' ).find( '.courseSettings' );
	elmSelectedCoursesSettings.slideToggle( 'fast' );<?php

	if ( $blnVoucherMatched ):?>
	$( '#voucherDiscountInfo' ).css( 'display', 'block' );
	<?php
	endif;?>
	$('[data-toggle="popover"]').popover( {
		html: true
		, container: 'body'
		, content: function () {
			var content = $(this).attr("data-popover-content");
			return $(content).clone();
			//return $(content).find(".popover-body").clone();
		}
	} );
});<?php
endif;?>

</script>
<?= $this->endSection() ?>
