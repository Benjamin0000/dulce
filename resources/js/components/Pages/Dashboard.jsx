export default function Dashboard(){
    return (
        <>
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">CRM Dashboard</h3>
                    <div class="nk-block-des text-soft"><p>Welcome to CRM Dashboard.</p></div>
                </div>
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="index.html#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                <li>
                                    <div class="dropdown">
                                        <a href="index.html#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-bs-toggle="dropdown">
                                            <em class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span class="d-none d-md-inline">Last</span> 30 Days</span>
                                            <em class="dd-indc icon ni ni-chevron-right"></em>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li>
                                                    <a href="index.html#"><span>Last 30 Days</span></a>
                                                </li>
                                                <li>
                                                    <a href="index.html#"><span>Last 6 Months</span></a>
                                                </li>
                                                <li>
                                                    <a href="index.html#"><span>Last 1 Years</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="nk-block-tools-opt">
                                    <a href="index.html#" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Reports</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="row g-gs">
                <div class="col-md-6 col-lg-5">
                    <div class="card card-bordered h-100">
                        <div class="card-inner">
                            <div class="card-title-group align-start pb-3 g-2">
                                <div class="card-title card-title-sm">
                                    <h6 class="title">Sales Revenue</h6>
                                    <p>In last 30 days revenue from subscription.</p>
                                </div>
                                <div class="card-tools"><em class="card-hint icon ni ni-help" data-bs-toggle="tooltip" data-bs-placement="left" title="Customer of this month"></em></div>
                            </div>
                            <div class="analytic-au">
                                <div class="analytic-data-group analytic-au-group g-3">
                                    <div class="analytic-data analytic-au-data">
                                        <div class="title">Monthly</div>
                                        <div class="amount">9.28K</div>
                                        <div class="change up"><em class="icon ni ni-arrow-long-up"></em>4.63%</div>
                                    </div>
                                    <div class="analytic-data analytic-au-data">
                                        <div class="title">Weekly</div>
                                        <div class="amount">2.69K</div>
                                        <div class="change down"><em class="icon ni ni-arrow-long-down"></em>1.92%</div>
                                    </div>
                                    <div class="analytic-data analytic-au-data">
                                        <div class="title">Daily (Avg)</div>
                                        <div class="amount">0.94K</div>
                                        <div class="change up"><em class="icon ni ni-arrow-long-up"></em>3.45%</div>
                                    </div>
                                </div>
                                <div class="analytic-au-ck"><canvas class="analytics-au-chart" id="analyticAuData"></canvas></div>
                                <div class="chart-label-group">
                                    <div class="chart-label">01 Feb, 2021</div>
                                    <div class="chart-label">30 Feb, 2021</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-7">
                    <div class="card card-bordered h-100">
                        <div class="card-inner">
                            <div class="card-title-group pb-3 g-2">
                                <div class="card-title card-title-sm">
                                    <h6 class="title">Import & Expense Report Statistics</h6>
                                    <p>Report Comparison</p>
                                </div>
                                <div class="card-tools shrink-0 d-none d-sm-block">
                                    <ul class="nav nav-switch-s2 nav-tabs bg-white">
                                        <li class="nav-item"><a href="index.html#" class="nav-link">7 D</a></li>
                                        <li class="nav-item"><a href="index.html#" class="nav-link active">1 M</a></li>
                                        <li class="nav-item"><a href="index.html#" class="nav-link">3 M</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="analytic-ov">
                                <div class="analytic-data-group analytic-ov-group g-3">
                                    <div class="analytic-data analytic-ov-data">
                                        <div class="title">Yearly</div>
                                        <div class="amount">2.7K</div>
                                        <div class="change up"><em class="icon ni ni-arrow-long-up"></em>12.37%</div>
                                    </div>
                                    <div class="analytic-data analytic-ov-data">
                                        <div class="title">Monothly</div>
                                        <div class="amount">3.8K</div>
                                        <div class="change up"><em class="icon ni ni-arrow-long-up"></em>47.74%</div>
                                    </div>
                                    <div class="analytic-data analytic-ov-data">
                                        <div class="title">Weekly</div>
                                        <div class="amount">9.9%</div>
                                        <div class="change down"><em class="icon ni ni-arrow-long-down"></em>12.37%</div>
                                    </div>
                                    <div class="analytic-data analytic-ov-data">
                                        <div class="title">Daily</div>
                                        <div class="amount">2.5%</div>
                                        <div class="change up"><em class="icon ni ni-arrow-long-up"></em>9.35%</div>
                                    </div>
                                </div>
                                <div class="analytic-ov-ck"><canvas class="analytics-line-large" id="analyticOvData"></canvas></div>
                                <div class="chart-label-group ms-5">
                                    <div class="chart-label">01 Jan, 2021</div>
                                    <div class="chart-label d-none d-sm-block">15 Jan, 2021</div>
                                    <div class="chart-label">30 Jan, 2021</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-xxl-4">
                    <div class="card card-bordered h-100">
                        <div class="card-inner mb-n2">
                            <div class="card-title-group">
                                <div class="card-title card-title-sm">
                                    <h6 class="title">Lead</h6>
                                    <p>Lead Statictics</p>
                                </div>
                                <div class="card-tools">
                                    <div class="drodown">
                                        <a href="index.html#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-bs-toggle="dropdown">30 Days</a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                            <ul class="link-list-opt no-bdr">
                                                <li>
                                                    <a href="index.html#"><span>7 Days</span></a>
                                                </li>
                                                <li>
                                                    <a href="index.html#"><span>15 Days</span></a>
                                                </li>
                                                <li>
                                                    <a href="index.html#"><span>30 Days</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-list is-loose traffic-channel-table">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col nk-tb-channel"><span>Duration</span></div>
                                <div class="nk-tb-col nk-tb-sessions"><span>Count</span></div>
                                <div class="nk-tb-col nk-tb-prev-sessions"><span>Prev Count</span></div>
                                <div class="nk-tb-col nk-tb-change"><span>Change</span></div>
                                <div class="nk-tb-col nk-tb-trend tb-col-sm text-end"><span>Statistics</span></div>
                            </div>
                            <div class="nk-tb-item">
                                <div class="nk-tb-col nk-tb-channel"><span class="tb-lead">Yearly</span></div>
                                <div class="nk-tb-col nk-tb-sessions">
                                    <span class="tb-sub tb-amount"><span>4305</span></span>
                                </div>
                                <div class="nk-tb-col nk-tb-prev-sessions">
                                    <span class="tb-sub tb-amount"><span>4128</span></span>
                                </div>
                                <div class="nk-tb-col nk-tb-change">
                                    <span class="tb-sub">
                                        <span>4.29%</span> <span class="change up"><em class="icon ni ni-arrow-long-up"></em></span>
                                    </span>
                                </div>
                                <div class="nk-tb-col nk-tb-trend text-end">
                                    <div class="traffic-channel-ck ms-auto"><canvas class="analytics-line-small" id="OrganicSearchData"></canvas></div>
                                </div>
                            </div>
                            <div class="nk-tb-item">
                                <div class="nk-tb-col nk-tb-channel"><span class="tb-lead">Monthly</span></div>
                                <div class="nk-tb-col nk-tb-sessions">
                                    <span class="tb-sub tb-amount"><span>859</span></span>
                                </div>
                                <div class="nk-tb-col nk-tb-prev-sessions">
                                    <span class="tb-sub tb-amount"><span>936</span></span>
                                </div>
                                <div class="nk-tb-col nk-tb-change">
                                    <span class="tb-sub">
                                        <span>15.8%</span> <span class="change down"><em class="icon ni ni-arrow-long-down"></em></span>
                                    </span>
                                </div>
                                <div class="nk-tb-col nk-tb-trend text-end">
                                    <div class="traffic-channel-ck ms-auto"><canvas class="analytics-line-small" id="SocialMediaData"></canvas></div>
                                </div>
                            </div>
                            <div class="nk-tb-item">
                                <div class="nk-tb-col nk-tb-channel"><span class="tb-lead">Weekly</span></div>
                                <div class="nk-tb-col nk-tb-sessions">
                                    <span class="tb-sub tb-amount"><span>482</span></span>
                                </div>
                                <div class="nk-tb-col nk-tb-prev-sessions">
                                    <span class="tb-sub tb-amount"><span>793</span></span>
                                </div>
                                <div class="nk-tb-col nk-tb-change">
                                    <span class="tb-sub">
                                        <span>41.3%</span> <span class="change down"><em class="icon ni ni-arrow-long-down"></em></span>
                                    </span>
                                </div>
                                <div class="nk-tb-col nk-tb-trend text-end">
                                    <div class="traffic-channel-ck ms-auto"><canvas class="analytics-line-small" id="ReferralsData"></canvas></div>
                                </div>
                            </div>
                            <div class="nk-tb-item">
                                <div class="nk-tb-col nk-tb-channel"><span class="tb-lead">Daily</span></div>
                                <div class="nk-tb-col nk-tb-sessions">
                                    <span class="tb-sub tb-amount"><span>138</span></span>
                                </div>
                                <div class="nk-tb-col nk-tb-prev-sessions">
                                    <span class="tb-sub tb-amount"><span>97</span></span>
                                </div>
                                <div class="nk-tb-col nk-tb-change">
                                    <span class="tb-sub">
                                        <span>12.6%</span> <span class="change up"><em class="icon ni ni-arrow-long-up"></em></span>
                                    </span>
                                </div>
                                <div class="nk-tb-col nk-tb-trend text-end">
                                    <div class="traffic-channel-ck ms-auto"><canvas class="analytics-line-small" id="OthersData"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card card-bordered card-full">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title"><h6 class="title">Recent Sale</h6></div>
                                    <div class="card-tools"><a href="recent-sale.html" class="link">View All</a></div>
                                </div>
                            </div>
                            <div class="card-inner p-0">
                                <table class="nk-tb-list nk-tb-ulist">
                                    <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">ID</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Price</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Status</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-end">
                                                <div class="dropdown">
                                                    <a href="index.html#" class="btn btn-xs btn-trigger btn-icon dropdown-toggle me-n1" data-bs-toggle="dropdown" data-offset="0,5">
                                                        <em class="icon ni ni-more-h"></em>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li>
                                                                <a href="index.html#"><em class="icon ni ni-check-round-cut"></em><span>Mark As Done</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="index.html#"><em class="icon ni ni-archive"></em><span>Mark As Archive</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="index.html#"><em class="icon ni ni-trash"></em><span>Remove Tasks</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col"><span>P-78</span></td>
                                            <td class="nk-tb-col">
                                                <span>Mackbook<span class="dot dot-success d-lg-none ms-1"></span></span>
                                            </td>
                                            <td class="nk-tb-col"><span>$999.00</span></td>
                                            <td class="nk-tb-col tb-col-lg"><span class="badge badge-dot badge-dot-xs bg-success">Available</span></td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions">
                                                    <li>
                                                        <div class="dropdown">
                                                            <a href="index.html#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li>
                                                                        <a data-bs-toggle="modal" href="index.html#editDataDash"><em class="icon ni ni-edit"></em><span>Edit Info</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-bs-toggle="modal" href="index.html#deleteData"><em class="icon ni ni-trash"></em><span>Trash</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col"><span>P-56</span></td>
                                            <td class="nk-tb-col">
                                                <span>iPhone<span class="dot dot-danger d-lg-none ms-1"></span></span>
                                            </td>
                                            <td class="nk-tb-col"><span>$700.00</span></td>
                                            <td class="nk-tb-col tb-col-lg"><span class="badge badge-dot badge-dot-xs bg-danger">Out of Stock</span></td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions">
                                                    <li>
                                                        <div class="dropdown">
                                                            <a href="index.html#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li>
                                                                        <a data-bs-toggle="modal" href="index.html#editDataDash"><em class="icon ni ni-edit"></em><span>Edit Info</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-bs-toggle="modal" href="index.html#deleteData"><em class="icon ni ni-trash"></em><span>Trash</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col"><span>P-68</span></td>
                                            <td class="nk-tb-col">
                                                <span>Watch<span class="dot dot-success d-lg-none ms-1"></span></span>
                                            </td>
                                            <td class="nk-tb-col"><span>$260.00</span></td>
                                            <td class="nk-tb-col tb-col-lg"><span class="badge badge-dot badge-dot-xs bg-success">Available</span></td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions">
                                                    <li>
                                                        <div class="dropdown">
                                                            <a href="index.html#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li>
                                                                        <a data-bs-toggle="modal" href="index.html#editDataDash"><em class="icon ni ni-edit"></em><span>Edit Info</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-bs-toggle="modal" href="index.html#deleteData"><em class="icon ni ni-trash"></em><span>Trash</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col"><span>P-56</span></td>
                                            <td class="nk-tb-col">
                                                <span>Earbuds<span class="dot dot-warning d-lg-none ms-1"></span></span>
                                            </td>
                                            <td class="nk-tb-col"><span>$180.00</span></td>
                                            <td class="nk-tb-col tb-col-lg"><span class="badge badge-dot badge-dot-xs bg-warning">Low Stock</span></td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions">
                                                    <li>
                                                        <div class="dropdown">
                                                            <a href="index.html#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li>
                                                                        <a data-bs-toggle="modal" href="index.html#editDataDash"><em class="icon ni ni-edit"></em><span>Edit Info</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-bs-toggle="modal" href="index.html#deleteData"><em class="icon ni ni-trash"></em><span>Trash</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xxl-3">
                    <div class="card card-bordered h-100">
                        <div class="card-inner">
                            <div class="card-title-group mb-5">
                                <div class="card-title card-title-sm"><h6 class="title">Client Payment Status</h6></div>
                                <div class="card-tools">
                                    <div class="dropdown">
                                        <a href="index.html#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-bs-toggle="dropdown">30 Days</a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                            <ul class="link-list-opt no-bdr">
                                                <li>
                                                    <a href="index.html#"><span>7 Days</span></a>
                                                </li>
                                                <li>
                                                    <a href="index.html#"><span>15 Days</span></a>
                                                </li>
                                                <li>
                                                    <a href="index.html#"><span>30 Days</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="payment-status">
                                <div class="nk-ck-md h-200px"><canvas class="polar-chart" id="polarChartData"></canvas></div>
                                <ul class="traffic-channel-group mt-3 ps-4">
                                    <li class="my-1 mx-2">
                                        <div class="title"><span class="dot dot-lg sq" data-bg="#9cabff"></span><span class="ms-1">Started</span></div>
                                    </li>
                                    <li class="my-1 mx-2">
                                        <div class="title"><span class="dot dot-lg sq" data-bg="#f4aaa4"></span><span class="ms-1">Inprogress</span></div>
                                    </li>
                                    <li class="my-1 mx-2">
                                        <div class="title"><span class="dot dot-lg sq" data-bg="#9785FF"></span><span class="ms-1">Completed</span></div>
                                    </li>
                                    <li class="my-1 mx-2">
                                        <div class="title"><span class="dot dot-lg sq" data-bg="#E85347"></span><span class="ms-1">Cencel</span></div>
                                    </li>
                                    <li class="my-1 mx-2">
                                        <div class="title"><span class="dot dot-lg sq" data-bg="#8feac5"></span><span class="ms-1">Success</span></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-6 col-xxl-4">
                    <div class="card card-bordered card-full">
                        <div class="card-inner d-flex flex-column h-100">
                            <div class="card-title-group mb-3">
                                <div class="card-title">
                                    <h6 class="title">Running Projects</h6>
                                    <p>In last 30 days top projects.</p>
                                </div>
                                <div class="card-tools mt-n4 me-n1">
                                    <div class="dropdown">
                                        <a href="index.html#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li>
                                                    <a href="index.html#"><span>15 Days</span></a>
                                                </li>
                                                <li>
                                                    <a href="index.html#" class="active"><span>30 Days</span></a>
                                                </li>
                                                <li>
                                                    <a href="index.html#"><span>3 Months</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-list gy-3">
                                <div class="progress-wrap">
                                    <div class="progress-text">
                                        <div class="progress-label">IT Solution</div>
                                        <div class="progress-amount">78%</div>
                                    </div>
                                    <div class="progress progress-md"><div class="progress-bar" data-progress="78"></div></div>
                                </div>
                                <div class="progress-wrap">
                                    <div class="progress-text">
                                        <div class="progress-label">Internet configuration</div>
                                        <div class="progress-amount">48.49%</div>
                                    </div>
                                    <div class="progress progress-md"><div class="progress-bar bg-orange" data-progress="48.49"></div></div>
                                </div>
                                <div class="progress-wrap">
                                    <div class="progress-text">
                                        <div class="progress-label">Database Management</div>
                                        <div class="progress-amount">29%</div>
                                    </div>
                                    <div class="progress progress-md"><div class="progress-bar bg-teal" data-progress="29"></div></div>
                                </div>
                                <div class="progress-wrap">
                                    <div class="progress-text">
                                        <div class="progress-label">Design tool</div>
                                        <div class="progress-amount">56%</div>
                                    </div>
                                    <div class="progress progress-md"><div class="progress-bar bg-pink" data-progress="56"></div></div>
                                </div>
                                <div class="progress-wrap">
                                    <div class="progress-text">
                                        <div class="progress-label">Banner completation</div>
                                        <div class="progress-amount">33%</div>
                                    </div>
                                    <div class="progress progress-md"><div class="progress-bar bg-azure" data-progress="33"></div></div>
                                </div>
                                <div class="progress-wrap">
                                    <div class="progress-text">
                                        <div class="progress-label">SEO Marketing</div>
                                        <div class="progress-amount">65%</div>
                                    </div>
                                    <div class="progress progress-md"><div class="progress-bar bg-info" data-progress="65"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-5">
                    <div class="card card-bordered h-100">
                        <div class="card-inner border-bottom">
                            <div class="card-title-group">
                                <div class="card-title"><h6 class="title">Support Requests</h6></div>
                                <div class="card-tools"><a href="index.html#" class="link">All Requests</a></div>
                            </div>
                        </div>
                        <ul class="nk-support">
                            <li class="nk-support-item">
                                <div class="user-avatar"><img src="../images/avatar/a-sm.jpg" alt="" /></div>
                                <div class="nk-support-content">
                                    <div class="title">
                                        <span>Vincent Lopez</span>
                                        <div class="status delivered"><em class="icon ni ni-check-circle-fill"></em></div>
                                    </div>
                                    <p>Thanks for contact us with your issues...</p>
                                    <span class="time">6 min ago</span>
                                </div>
                            </li>
                            <li class="nk-support-item">
                                <div class="user-avatar bg-purple-dim"><span>DM</span></div>
                                <div class="nk-support-content">
                                    <div class="title">
                                        <span>Daniel Moore</span>
                                        <div class="status unread"><em class="icon ni ni-bullet-fill"></em></div>
                                    </div>
                                    <p>Thanks for contact us with your issues...</p>
                                    <span class="time">2 Hours ago</span>
                                </div>
                            </li>
                            <li class="nk-support-item">
                                <div class="user-avatar"><img src="../images/avatar/b-sm.jpg" alt="" /></div>
                                <div class="nk-support-content">
                                    <div class="title">
                                        <span>Larry Henry</span>
                                        <div class="status sent"><em class="icon ni ni-check-circle"></em></div>
                                    </div>
                                    <p>Thanks for contact us with your issues...</p>
                                    <span class="time">3 Hours ago</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-3">
                    <div class="card card-bordered h-100">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title card-title-sm"><h6 class="title">Traffic Channel</h6></div>
                                <div class="card-tools">
                                    <div class="drodown">
                                        <a href="index.html#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-bs-toggle="dropdown">30 Days</a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                            <ul class="link-list-opt no-bdr">
                                                <li>
                                                    <a href="index.html#"><span>7 Days</span></a>
                                                </li>
                                                <li>
                                                    <a href="index.html#"><span>15 Days</span></a>
                                                </li>
                                                <li>
                                                    <a href="index.html#"><span>30 Days</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="traffic-channel">
                                <div class="traffic-channel-doughnut-ck"><canvas class="analytics-doughnut" id="TrafficChannelDoughnutData"></canvas></div>
                                <div class="traffic-channel-group g-2">
                                    <div class="traffic-channel-data">
                                        <div class="title"><span class="dot dot-lg sq" data-bg="#9cabff"></span><span>Organic Search</span></div>
                                        <div class="amount">4,305 <small>58.63%</small></div>
                                    </div>
                                    <div class="traffic-channel-data">
                                        <div class="title"><span class="dot dot-lg sq" data-bg="#b8acff"></span><span>Social Media</span></div>
                                        <div class="amount">859 <small>23.94%</small></div>
                                    </div>
                                    <div class="traffic-channel-data">
                                        <div class="title"><span class="dot dot-lg sq" data-bg="#ffa9ce"></span><span>Referrals</span></div>
                                        <div class="amount">482 <small>12.94%</small></div>
                                    </div>
                                    <div class="traffic-channel-data">
                                        <div class="title"><span class="dot dot-lg sq" data-bg="#f9db7b"></span><span>Others</span></div>
                                        <div class="amount">138 <small>4.49%</small></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </>
    )
}