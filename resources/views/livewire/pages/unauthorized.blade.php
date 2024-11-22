<div>
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            {{-- {{ $titulo }} --}}
          <h3 class="fw-bold mb-3"></h3>
          <h6 class="op-7 mb-2">Hoy 17 de Agosto del 2024</h6>
          <h4> 
                @if (session('status') === 'logged-in')
                    <span style="color: green;">You are logged in!</span>
                @endif
            </h4>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
          <a href="#" class="btn btn-label-info btn-round me-2">Clima APPI</a>
          <a href="#" class="btn btn-primary btn-round">Tikets</a>
        </div>
      </div>
    <div class="row">
        @include('components.header.header') 
    </div>
    <div class="row">
        @livewire('components.dashboard.generalStatistics')
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-round">
              <div class="card-header">
                <div class="card-head-row card-tools-still-right">
                  <div class="card-title">Transaction History</div>
                  <div class="card-tools">
                    <div class="dropdown">
                      <button
                        class="btn btn-icon btn-clean me-0"
                        type="button"
                        id="dropdownMenuButton"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <i class="fas fa-ellipsis-h"></i>
                      </button>
                      <div
                        class="dropdown-menu"
                        aria-labelledby="dropdownMenuButton"
                      >
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#"
                          >Something else here</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <!-- Projects table -->
                  <table class="table align-items-center mb-0">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Payment Number</th>
                        <th scope="col" class="text-end">Date & Time</th>
                        <th scope="col" class="text-end">Amount</th>
                        <th scope="col" class="text-end">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">
                          <button
                            class="btn btn-icon btn-round btn-success btn-sm me-2"
                          >
                            <i class="fa fa-check"></i>
                          </button>
                          Payment from #10231
                        </th>
                        <td class="text-end">Mar 19, 2020, 2.45pm</td>
                        <td class="text-end">$250.00</td>
                        <td class="text-end">
                          <span class="badge badge-success">Completed</span>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <button
                            class="btn btn-icon btn-round btn-success btn-sm me-2"
                          >
                            <i class="fa fa-check"></i>
                          </button>
                          Payment from #10231
                        </th>
                        <td class="text-end">Mar 19, 2020, 2.45pm</td>
                        <td class="text-end">$250.00</td>
                        <td class="text-end">
                          <span class="badge badge-success">Completed</span>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <button
                            class="btn btn-icon btn-round btn-success btn-sm me-2"
                          >
                            <i class="fa fa-check"></i>
                          </button>
                          Payment from #10231
                        </th>
                        <td class="text-end">Mar 19, 2020, 2.45pm</td>
                        <td class="text-end">$250.00</td>
                        <td class="text-end">
                          <span class="badge badge-success">Completed</span>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <button
                            class="btn btn-icon btn-round btn-success btn-sm me-2"
                          >
                            <i class="fa fa-check"></i>
                          </button>
                          Payment from #10231
                        </th>
                        <td class="text-end">Mar 19, 2020, 2.45pm</td>
                        <td class="text-end">$250.00</td>
                        <td class="text-end">
                          <span class="badge badge-success">Completed</span>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <button
                            class="btn btn-icon btn-round btn-success btn-sm me-2"
                          >
                            <i class="fa fa-check"></i>
                          </button>
                          Payment from #10231
                        </th>
                        <td class="text-end">Mar 19, 2020, 2.45pm</td>
                        <td class="text-end">$250.00</td>
                        <td class="text-end">
                          <span class="badge badge-success">Completed</span>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <button
                            class="btn btn-icon btn-round btn-success btn-sm me-2"
                          >
                            <i class="fa fa-check"></i>
                          </button>
                          Payment from #10231
                        </th>
                        <td class="text-end">Mar 19, 2020, 2.45pm</td>
                        <td class="text-end">$250.00</td>
                        <td class="text-end">
                          <span class="badge badge-success">Completed</span>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <button
                            class="btn btn-icon btn-round btn-success btn-sm me-2"
                          >
                            <i class="fa fa-check"></i>
                          </button>
                          Payment from #10231
                        </th>
                        <td class="text-end">Mar 19, 2020, 2.45pm</td>
                        <td class="text-end">$250.00</td>
                        <td class="text-end">
                          <span class="badge badge-success">Completed</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
    
</div>