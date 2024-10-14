
export default function Sidebar(){
    return (
        <>
            <div className="nk-sidebar nk-sidebar-fixed" data-content="sidebarMenu">
                <div className="nk-sidebar-element nk-sidebar-head">
                    <div className="nk-menu-trigger">
                        <a href="#" className="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em className="icon ni ni-arrow-left"></em></a>
                        <a href="#" className="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em className="icon ni ni-menu"></em></a>
                    </div>
                    <div className="nk-sidebar-brand">
                        <a href="https://dashlite.net/demo1/index.html" className="logo-link nk-sidebar-logo">
                            <img className="logo-light logo-img" src="../images/logo.png" srcSet="../images/logo2x.png 2x" alt="logo" />
                            <img className="logo-dark logo-img" src="../images/logo-dark.png" srcSet="../images/logo-dark2x.png 2x" alt="logo-dark" />
                        </a>
                    </div>
                </div>
                <div className="nk-sidebar-element nk-sidebar-body">
                    <div className="nk-sidebar-content">
                        <div className="nk-sidebar-menu" data-simplebar>
                            <ul className="nk-menu">
                                <li className="nk-menu-item">
                                    <a href="index.html" className="nk-menu-link">
                                        <span className="nk-menu-icon"><em className="icon ni ni-dashboard-fill"></em></span><span className="nk-menu-text">Dashboard</span>
                                    </a>
                                </li>
                                <li className="nk-menu-item has-sub">
                                    <a href="index.html#" className="nk-menu-link nk-menu-toggle">
                                        <span className="nk-menu-icon"><em className="icon ni ni-users-fill"></em></span><span className="nk-menu-text">Lead</span>
                                    </a>
                                    <ul className="nk-menu-sub">
                                        <li className="nk-menu-item">
                                            <a href="people.html" className="nk-menu-link"><span className="nk-menu-text">People</span></a>
                                        </li>
                                        <li className="nk-menu-item">
                                            <a href="organizations.html" className="nk-menu-link"><span className="nk-menu-text">Organization</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li className="nk-menu-item">
                                    <a href="customer-list.html" className="nk-menu-link">
                                        <span className="nk-menu-icon"><em className="icon ni ni-user-list-fill"></em></span><span className="nk-menu-text">Customers</span>
                                    </a>
                                </li>
                                <li className="nk-menu-item has-sub">
                                    <a href="index.html#" className="nk-menu-link nk-menu-toggle">
                                        <span className="nk-menu-icon"><em className="icon ni ni-cart-fill"></em></span><span className="nk-menu-text">Sales</span>
                                    </a>
                                    <ul className="nk-menu-sub">
                                        <li className="nk-menu-item">
                                            <a href="invoices.html" className="nk-menu-link"><span className="nk-menu-text">Invoices</span></a>
                                        </li>
                                        <li className="nk-menu-item">
                                            <a href="payment.html" className="nk-menu-link"><span className="nk-menu-text">Payment</span></a>
                                        </li>
                                        <li className="nk-menu-item">
                                            <a href="recent-sale.html" className="nk-menu-link"><span className="nk-menu-text">Recent Sale</span></a>
                                        </li>
                                        <li className="nk-menu-item">
                                            <a href="estimates.html" className="nk-menu-link"><span className="nk-menu-text">Estimates</span></a>
                                        </li>
                                        <li className="nk-menu-item">
                                            <a href="expenses.html" className="nk-menu-link"><span className="nk-menu-text">Expenses</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li className="nk-menu-item has-sub">
                                    <a href="index.html#" className="nk-menu-link nk-menu-toggle">
                                        <span className="nk-menu-icon"><em className="icon ni ni-tranx"></em></span><span className="nk-menu-text">Transaction</span>
                                    </a>
                                    <ul className="nk-menu-sub">
                                        <li className="nk-menu-item">
                                            <a href="deposit.html" className="nk-menu-link"><span className="nk-menu-text">Recent Deposits</span></a>
                                        </li>
                                        <li className="nk-menu-item">
                                            <a href="transaction.html" className="nk-menu-link"><span className="nk-menu-text"> All Transaction</span></a>
                                        </li>
                                        <li className="nk-menu-item">
                                            <a href="transfer-report.html" className="nk-menu-link"><span className="nk-menu-text">Transfer Report</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li className="nk-menu-item has-sub">
                                    <a href="index.html#" className="nk-menu-link nk-menu-toggle">
                                        <span className="nk-menu-icon"><em className="icon ni ni-task-fill-c"></em></span><span className="nk-menu-text">Task</span>
                                    </a>
                                    <ul className="nk-menu-sub">
                                        <li className="nk-menu-item">
                                            <a href="running-task.html" className="nk-menu-link"><span className="nk-menu-text">Running Task</span></a>
                                        </li>
                                        <li className="nk-menu-item">
                                            <a href="archive-task.html" className="nk-menu-link"><span className="nk-menu-text">Archived Task</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li className="nk-menu-item has-sub">
                                    <a href="index.html#" className="nk-menu-link nk-menu-toggle">
                                        <span className="nk-menu-icon"><em className="icon ni ni-coin"></em></span><span className="nk-menu-text">Account</span>
                                    </a>
                                    <ul className="nk-menu-sub">
                                        <li className="nk-menu-item">
                                            <a href="client-payment.html" className="nk-menu-link"><span className="nk-menu-text">Client Payment</span></a>
                                        </li>
                                        <li className="nk-menu-item">
                                            <a href="expense-management.html" className="nk-menu-link"><span className="nk-menu-text">Expense Management</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li className="nk-menu-item has-sub">
                                    <a href="index.html#" className="nk-menu-link nk-menu-toggle">
                                        <span className="nk-menu-icon"><em className="icon ni ni-truck"></em></span><span className="nk-menu-text">Product Management</span>
                                    </a>
                                    <ul className="nk-menu-sub">
                                        <li className="nk-menu-item">
                                            <a href="products.html" className="nk-menu-link"><span className="nk-menu-text">Products</span></a>
                                        </li>
                                        <li className="nk-menu-item">
                                            <a href="warehouse.html" className="nk-menu-link"><span className="nk-menu-text">Warehouse</span></a>
                                        </li>
                                        <li className="nk-menu-item">
                                            <a href="product-transfer.html" className="nk-menu-link"><span className="nk-menu-text">Product Transfer</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li className="nk-menu-item has-sub">
                                    <a href="index.html#" className="nk-menu-link nk-menu-toggle">
                                        <span className="nk-menu-icon"><em className="icon ni ni-growth-fill"></em></span><span className="nk-menu-text">Report</span>
                                    </a>
                                    <ul className="nk-menu-sub">
                                        <li className="nk-menu-item">
                                            <a href="dealing-info.html" className="nk-menu-link"><span className="nk-menu-text">Dealing Info</span></a>
                                        </li>
                                        <li className="nk-menu-item">
                                            <a href="client-report.html" className="nk-menu-link"><span className="nk-menu-text">Client Report</span></a>
                                        </li>
                                        <li className="nk-menu-item">
                                            <a href="expense-report.html" className="nk-menu-link"><span className="nk-menu-text">Expense Report</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li className="nk-menu-item">
                                    <a href="employee.html" className="nk-menu-link">
                                        <span className="nk-menu-icon"><em className="icon ni ni-layers-fill"></em></span><span className="nk-menu-text">Employees</span>
                                    </a>
                                </li>
                                <li className="nk-menu-item">
                                    <a href="projects.html" className="nk-menu-link">
                                        <span className="nk-menu-icon"><em className="icon ni ni-list-index-fill"></em></span><span className="nk-menu-text">Projects</span>
                                    </a>
                                </li>
                                <li className="nk-menu-item has-sub">
                                    <a href="index.html#" className="nk-menu-link nk-menu-toggle">
                                        <span className="nk-menu-icon"><em className="icon ni ni-coins"></em></span><span className="nk-menu-text">Payroll</span>
                                    </a>
                                    <ul className="nk-menu-sub">
                                        <li className="nk-menu-item">
                                            <a href="salary-grade.html" className="nk-menu-link"><span className="nk-menu-text">Salary grade</span></a>
                                        </li>
                                        <li className="nk-menu-item">
                                            <a href="employee-salary-list.html" className="nk-menu-link"><span className="nk-menu-text">Employee Salary List</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li className="nk-menu-item">
                                    <a href="time-history.html" className="nk-menu-link">
                                        <span className="nk-menu-icon"><em className="icon ni ni-calendar-check-fill"></em></span><span className="nk-menu-text">Attendance</span>
                                    </a>
                                </li>
                                <li className="nk-menu-item">
                                    <a href="subscription.html" className="nk-menu-link">
                                        <span className="nk-menu-icon"><em className="icon ni ni-invest"></em></span><span className="nk-menu-text">Subscription</span>
                                    </a>
                                </li>
                                <li className="nk-menu-item">
                                    <a href="notice-board.html" className="nk-menu-link">
                                        <span className="nk-menu-icon"><em className="icon ni ni-notice"></em></span><span className="nk-menu-text">Notice Board</span>
                                    </a>
                                </li>
                                <li className="nk-menu-item">
                                    <a href="support.html" className="nk-menu-link">
                                        <span className="nk-menu-icon"><em className="icon ni ni-chat-circle-fill"></em></span><span className="nk-menu-text">Support</span>
                                    </a>
                                </li>
                                <li className="nk-menu-item">
                                    <a href="settings.html" className="nk-menu-link">
                                        <span className="nk-menu-icon"><em className="icon ni ni-setting-alt-fill"></em></span><span className="nk-menu-text">Settings</span>
                                    </a>
                                </li>
                                <li className="nk-menu-heading"><h6 className="overline-title text-primary-alt">Return to</h6></li>
                                <li className="nk-menu-item">
                                    <a href="https://dashlite.net/demo1/index.html" className="nk-menu-link">
                                        <span className="nk-menu-icon"><em className="icon ni ni-dashlite-alt"></em></span><span className="nk-menu-text">Main Dashboard</span>
                                    </a>
                                </li>
                                <li className="nk-menu-item">
                                    <a href="https://dashlite.net/demo1/components.html" className="nk-menu-link">
                                        <span className="nk-menu-icon"><em className="icon ni ni-layers-fill"></em></span><span className="nk-menu-text">All Components</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}