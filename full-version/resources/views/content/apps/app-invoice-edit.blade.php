@extends('layouts/layoutMaster')

@section('title', 'Edit - Invoice')

@section('vendor-style')
@vite('resources/assets/vendor/libs/flatpickr/flatpickr.scss')
@endsection

@section('page-style')
@vite('resources/assets/vendor/scss/pages/app-invoice.scss')
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/flatpickr/flatpickr.js',
  'resources/assets/vendor/libs/cleavejs/cleave.js',
  'resources/assets/vendor/libs/cleavejs/cleave-phone.js',
  'resources/assets/vendor/libs/jquery-repeater/jquery-repeater.js'
])
@endsection

@section('page-script')
@vite([
  'resources/assets/js/offcanvas-add-payment.js',
  'resources/assets/js/offcanvas-send-invoice.js',
  'resources/assets/js/app-invoice-edit.js'
])
@endsection

@section('content')
<div class="row invoice-edit">
  <!-- Invoice Edit-->
  <div class="col-lg-9 col-12 mb-lg-0 mb-4">
    <div class="card invoice-preview-card">
      <div class="card-body">
        <div class="row m-sm-4 m-0">
          <div class="col-md-7 mb-md-0 mb-4 ps-0">
            <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
              <div class="app-brand-logo demo">@include('_partials.macros',["height"=>22,"withbg"=>''])</div>
              <span class="app-brand-text fw-bold fs-4">
                {{ config('variables.templateName') }}
              </span>
            </div>
            <p class="mb-2">Office 149, 450 South Brand Brooklyn</p>
            <p class="mb-2">San Diego County, CA 91905, USA</p>
            <p class="mb-3">+1 (123) 456 7891, +44 (876) 543 2198</p>
          </div>
          <div class="col-md-5">
            <dl class="row mb-2">
              <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end ps-0">
                <span class="h4 text-capitalize mb-0 text-nowrap">Invoice</span>
              </dt>
              <dd class="col-sm-6 d-flex justify-content-md-end pe-0 ps-0 ps-sm-2">
                <div class="input-group input-group-merge disabled w-px-150">
                  <span class="input-group-text">#</span>
                  <input type="text" class="form-control" disabled placeholder="74909" value="74909" id="invoiceId" />
                </div>
              </dd>
              <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end ps-0">
                <span class="fw-normal">Date:</span>
              </dt>
              <dd class="col-sm-6 d-flex justify-content-md-end pe-0 ps-0 ps-sm-2">
                <input type="text" class="form-control w-px-150 invoice-date" placeholder="YYYY-MM-DD" />
              </dd>
              <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end ps-0">
                <span class="fw-normal">Due Date:</span>
              </dt>
              <dd class="col-sm-6 d-flex justify-content-md-end pe-0 ps-0 ps-sm-2">
                <input type="text" class="form-control w-px-150 due-date" placeholder="YYYY-MM-DD" />
              </dd>
            </dl>
          </div>
        </div>

        <hr class="my-3 mx-n4" />

        <div class="row p-sm-4 p-0">
          <div class="col-md-6 col-sm-5 col-12 mb-sm-0 mb-4">
            <h6 class="mb-4">Invoice To:</h6>
            <p class="mb-1">Thomas shelby</p>
            <p class="mb-1">Shelby Company Limited</p>
            <p class="mb-1">Small Heath, B10 0HF, UK</p>
            <p class="mb-1">718-986-6062</p>
            <p class="mb-0">peakyFBlinders@gmail.com</p>
          </div>
          <div class="col-md-6 col-sm-7">
            <h6 class="mb-4">Bill To:</h6>
            <table>
              <tbody>
                <tr>
                  <td class="pe-4">Total Due:</td>
                  <td><span class="fw-medium">$12,110.55</span></td>
                </tr>
                <tr>
                  <td class="pe-4">Bank name:</td>
                  <td>American Bank</td>
                </tr>
                <tr>
                  <td class="pe-4">Country:</td>
                  <td>United States</td>
                </tr>
                <tr>
                  <td class="pe-4">IBAN:</td>
                  <td>ETD95476213874685</td>
                </tr>
                <tr>
                  <td class="pe-4">SWIFT code:</td>
                  <td>BR91905</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <hr class="my-3 mx-n4" />

        <form class="source-item pt-4 px-0 px-sm-4">
          <div class="mb-3" data-repeater-list="group-a">
            <div class="repeater-wrapper pt-0 pt-md-4" data-repeater-item>
              <div class="d-flex border rounded position-relative pe-0">
                <div class="row w-100 p-3">
                  <div class="col-md-6 col-12 mb-md-0 mb-3">
                    <p class="mb-2 repeater-title">Item</p>
                    <select class="form-select item-details mb-3">
                      <option value="App Design">App Design</option>
                      <option value="App Customization" selected>App Customization</option>
                      <option value="ABC Template">ABC Template</option>
                      <option value="App Development">App Development</option>
                    </select>
                    <textarea class="form-control" rows="2">The most developer friendly & highly customizable HTML5 Admin</textarea>
                  </div>
                  <div class="col-md-3 col-12 mb-md-0 mb-3">
                    <p class="mb-2 repeater-title">Cost</p>
                    <input type="text" class="form-control invoice-item-price mb-3" value="24" placeholder="24" min="12" />
                    <div>
                      <span>Discount:</span>
                      <span class="discount me-2">0%</span>
                      <span class="tax-1 me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Tax 1">0%</span>
                      <span class="tax-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Tax 2">0%</span>
                    </div>
                  </div>
                  <div class="col-md-2 col-12 mb-md-0 mb-3">
                    <p class="mb-2 repeater-title">Qty</p>
                    <input type="text" class="form-control invoice-item-qty" value="1" placeholder="1" min="1" max="50" />
                  </div>
                  <div class="col-md-1 col-12 pe-0">
                    <p class="mb-2 repeater-title">Price</p>
                    <p class="mb-0">$24.00</p>
                  </div>
                </div>
                <div class="d-flex flex-column align-items-center justify-content-between border-start p-2">
                  <i class="ti ti-x cursor-pointer" data-repeater-delete></i>
                  <div class="dropdown">
                    <i class="ti ti-settings ti-xs cursor-pointer more-options-dropdown" role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    </i>
                    <div class="dropdown-menu dropdown-menu-end w-px-300 p-3" aria-labelledby="dropdownMenuButton">

                      <div class="row g-3">
                        <div class="col-12">
                          <label for="discountInput" class="form-label">Discount(%)</label>
                          <input type="number" class="form-control" id="discountInput" min="0" max="100" />
                        </div>
                        <div class="col-md-6">
                          <label for="taxInput1" class="form-label">Tax 1</label>
                          <select name="tax-1-input" id="taxInput1" class="form-select tax-select">
                            <option value="0%" selected>0%</option>
                            <option value="1%">1%</option>
                            <option value="10%">10%</option>
                            <option value="18%">18%</option>
                            <option value="40%">40%</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label for="taxInput2" class="form-label">Tax 2</label>
                          <select name="tax-2-input" id="taxInput2" class="form-select tax-select">
                            <option value="0%" selected>0%</option>
                            <option value="1%">1%</option>
                            <option value="10%">10%</option>
                            <option value="18%">18%</option>
                            <option value="40%">40%</option>
                          </select>
                        </div>
                      </div>
                      <div class="dropdown-divider my-3"></div>
                      <button type="button" class="btn btn-label-primary btn-apply-changes">Apply</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row pb-4">
            <div class="col-12">
              <button type="button" class="btn btn-primary" data-repeater-create>Add Item</button>
            </div>
          </div>
        </form>

        <hr class="my-3 mx-n4" />

        <div class="row p-0 p-sm-4">
          <div class="col-md-6 mb-md-0 mb-3">
            <div class="d-flex align-items-center mb-3">
              <label for="salesperson" class="form-label me-4 fw-medium">Salesperson:</label>
              <input type="text" class="form-control ms-3" id="salesperson" placeholder="Edward Crowley" value="Edward Crowley" />
            </div>
            <input type="text" class="form-control" id="invoiceMsg" placeholder="Thanks for your business" value="Thanks for your business" />
          </div>
          <div class="col-md-6 d-flex justify-content-end">
            <div class="invoice-calculations">
              <div class="d-flex justify-content-between mb-2">
                <span class="w-px-100">Subtotal:</span>
                <span class="fw-medium">$5000.25</span>
              </div>
              <div class="d-flex justify-content-between mb-2">
                <span class="w-px-100">Discount:</span>
                <span class="fw-medium">$00.00</span>
              </div>
              <div class="d-flex justify-content-between mb-2">
                <span class="w-px-100">Tax:</span>
                <span class="fw-medium">$100.00</span>
              </div>
              <hr />
              <div class="d-flex justify-content-between">
                <span class="w-px-100">Total:</span>
                <span class="fw-medium">$5100.25</span>
              </div>
            </div>
          </div>
        </div>

        <hr class="my-3 mx-n4" />

        <div class="row px-0 px-sm-4">
          <div class="col-12">
            <div class="mb-3">
              <label for="note" class="form-label fw-medium">Note:</label>
              <textarea class="form-control" rows="2" id="note">It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance projects. Thank You!</textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Invoice Edit-->

  <!-- Invoice Actions -->
  <div class="col-lg-3 col-12 invoice-actions">
    <div class="card mb-4">
      <div class="card-body">
        <button class="btn btn-success d-grid w-50">
          <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-plus ti-xs me-2"></i>Send Invoice</span>
        </button>
        <div class="d-flex my-2">
          <a href="{{url('app/invoice/preview')}}" class="btn btn-label-secondary w-100 me-2">Preview</a>
          <button type="button" class="btn btn-label-secondary w-100">Save</button>
        </div>
        <button class="btn btn-primary d-grid w-100" data-bs-toggle="offcanvas" data-bs-target="#addPaymentOffcanvas">
          <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-currency-dollar ti-xs me-2"></i>Add Payment</span>
        </button>
      </div>
    </div>
    <div>
      <p class="mb-2">Accept payments via</p>
      <select class="form-select mb-4">
        <option value="Bank Account">Bank Account</option>
        <option value="Paypal">Paypal</option>
        <option value="Card">Credit/Debit Card</option>
        <option value="UPI Transfer">UPI Transfer</option>
      </select>
      <div class="d-flex justify-content-between mb-2">
        <label for="payment-terms" class="mb-0">Payment Terms</label>
        <label class="switch switch-primary me-0">
          <input type="checkbox" class="switch-input" id="payment-terms" checked />
          <span class="switch-toggle-slider">
            <span class="switch-on"></span>
            <span class="switch-off"></span>
          </span>
          <span class="switch-label"></span>
        </label>
      </div>
      <div class="d-flex justify-content-between mb-2">
        <label for="client-notes" class="mb-0">Client Notes</label>
        <label class="switch switch-primary me-0">
          <input type="checkbox" class="switch-input" id="client-notes" />
          <span class="switch-toggle-slider">
            <span class="switch-on"></span>
            <span class="switch-off"></span>
          </span>
          <span class="switch-label"></span>
        </label>
      </div>
      <div class="d-flex justify-content-between">
        <label for="payment-stub" class="mb-0">Payment Stub</label>
        <label class="switch switch-primary me-0">
          <input type="checkbox" class="switch-input" id="payment-stub" />
          <span class="switch-toggle-slider">
            <span class="switch-on"></span>
            <span class="switch-off"></span>
          </span>
          <span class="switch-label"></span>
        </label>
      </div>
    </div>
  </div>
  <!-- /Invoice Actions -->
</div>

<!-- Offcanvas -->
@include('_partials/_offcanvas/offcanvas-send-invoice')
@include('_partials/_offcanvas/offcanvas-add-payment')
<!-- /Offcanvas -->
@endsection
