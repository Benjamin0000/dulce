import React from 'react';
import ReactDOM from 'react-dom/client';
import Header from './Header';
import Footer from './Footer';
import Sidebar from './Sidebar';
function Main() {
    return (
        <>
        <div className="nk-app-root">
            <div className="nk-main">
                <Sidebar/>
                <div className="nk-wrap">
                    <Header/>
                    <div className="nk-content">
                        <div className="container-fluid">
                            <div className="nk-content-inner">
                                <div className="nk-content-body">
                                    {/* Router */}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="nk-footer">
                        <div className="container-fluid">
                            <div className="nk-footer-wrap">
                                <div className="nk-footer-copyright">&copy;Dulce</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ul className="nk-sticky-toolbar">
            <li className="demo-layout">
                <a className="toggle tipinfo" data-target="demoML" href="index.html#" title="Main Demo Preview"><em className="icon ni ni-dashlite"></em></a>
            </li>
            <li className="demo-thumb">
                <a className="toggle tipinfo" data-target="demoUC" href="index.html#" title="Use Case Concept"><em className="icon ni ni-menu-squared"></em></a>
            </li>
            <li className="demo-settings">
                <a className="toggle tipinfo" data-target="settingPanel" href="index.html#" title="Demo Settings"><em className="icon ni ni-setting-alt"></em></a>
            </li>
            <li className="demo-purchase">
                <a className="tipinfo" target="_blank" href="https://1.envato.market/e0y3g" title="Purchase"><em className="icon ni ni-cart"></em></a>
            </li>
        </ul>
        <div className="nk-demo-panel nk-demo-panel-2x toggle-slide toggle-slide-right" data-content="demoML" data-toggle-overlay="true" data-toggle-body="true" data-toggle-screen="any">
            <div className="nk-demo-head">
                <h6 className="mb-0">Switch Demo Layout</h6>
                <a className="nk-demo-close toggle btn btn-icon btn-trigger revarse mr-n2" data-target="demoML" href="index.html#"><em className="icon ni ni-cross"></em></a>
            </div>
            <div className="nk-demo-list" data-simplebar>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo1/index.html">
                        <div className="nk-demo-image bg-blue"><img className="bg-purple" src="../../images/landing/layout-1d.jpg" srcSet="../../images/landing/layout-1d2x.jpg 2x" alt="Demo Layout 1" /></div>
                        <span className="nk-demo-title"><strong>Demo Layout 1</strong></span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo2/index.html">
                        <div className="nk-demo-image bg-purple"><img src="../../images/landing/layout-2d.jpg" srcSet="../../images/landing/layout-2d2x.jpg 2x" alt="Demo Layout 2" /></div>
                        <span className="nk-demo-title"><strong>Demo Layout 2</strong></span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo3/index.html">
                        <div className="nk-demo-image bg-success"><img src="../../images/landing/layout-3d.jpg" srcSet="../../images/landing/layout-3d2x.jpg 2x" alt="Demo Layout 3" /></div>
                        <span className="nk-demo-title"><strong>Demo Layout 3</strong></span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo4/index.html">
                        <div className="nk-demo-image bg-indigo"><img src="../../images/landing/layout-4d.jpg" srcSet="../../images/landing/layout-4d2x.jpg 2x" alt="Demo Layout 4" /></div>
                        <span className="nk-demo-title"><strong>Demo Layout 4</strong></span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo5/index.html">
                        <div className="nk-demo-image bg-orange"><img src="../../images/landing/layout-5d.jpg" srcSet="../../images/landing/layout-5d2x.jpg 2x" alt="Demo Layout 5" /></div>
                        <span className="nk-demo-title"><strong>Demo Layout 5</strong></span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo6/index.html">
                        <div className="nk-demo-image bg-purple"><img src="../../images/landing/layout-6d.jpg" srcSet="../../images/landing/layout-6d2x.jpg 2x" alt="Demo Layout 6" /></div>
                        <span className="nk-demo-title"><strong>Demo Layout 6</strong></span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo7/index.html">
                        <div className="nk-demo-image bg-teal"><img src="../../images/landing/layout-7d.jpg" srcSet="../../images/landing/layout-7d2x.jpg 2x" alt="Demo Layout 7" /></div>
                        <span className="nk-demo-title"><strong>Demo Layout 7</strong></span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo8/index.html">
                        <div className="nk-demo-image bg-azure"><img src="../../images/landing/layout-8d.jpg" srcSet="../../images/landing/layout-8d2x.jpg 2x" alt="Demo Layout 8" /></div>
                        <span className="nk-demo-title"><strong>Demo Layout 8</strong></span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo9/index.html">
                        <div className="nk-demo-image bg-pink"><img src="../../images/landing/layout-9d.jpg" srcSet="../../images/landing/layout-9d2x.jpg 2x" alt="Demo Layout 9" /></div>
                        <span className="nk-demo-title"><strong>Demo Layout 9</strong></span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/landing/index.html">
                        <div className="nk-demo-image bg-red"><img src="../../images/landing/main-landing.jpg" srcSet="../../images/landing/main-landing2x.jpg 2x" alt="Landing Page" /></div>
                        <span className="nk-demo-title"><strong>Landing Page</strong> <span className="badge badge-danger ml-1">Free</span></span>
                    </a>
                </div>
            </div>
        </div>
        <div className="nk-demo-panel nk-demo-panel-2x toggle-slide toggle-slide-right" data-content="demoUC" data-toggle-overlay="true" data-toggle-body="true" data-toggle-screen="any">
            <div className="nk-demo-head">
                <h6 className="mb-0">Use Case Concept</h6>
                <a className="nk-demo-close toggle btn btn-icon btn-trigger revarse mr-n2" data-target="demoUC" href="index.html#"><em className="icon ni ni-cross"></em></a>
            </div>
            <div className="nk-demo-list" data-simplebar>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo9/copywriter/index.html">
                        <div className="nk-demo-image bg-indigo"><img src="../../images/landing/demo-ai-copywriter.jpg" srcSet="../../images/landing/demo-ai-copywriter2x.jpg 2x" alt="ai-copywriter" /></div>
                        <span className="nk-demo-title">
                            <em className="text-primary">Demo9</em><br />
                            <strong>Ai Copywriter Panel</strong>
                        </span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo7/pharmacy/index.html">
                        <div className="nk-demo-image bg-warning"><img src="../../images/landing/demo-pharmacy.jpg" srcSet="../../images/landing/demo-pharmacy2x.jpg 2x" alt="pharmacy" /></div>
                        <span className="nk-demo-title">
                            <em className="text-primary">Demo7</em><br />
                            <strong>Pharmacy Management Panel</strong>
                        </span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo5/loan/index.html">
                        <div className="nk-demo-image bg-purple"><img src="../../images/landing/demo-loan.jpg" srcSet="../../images/landing/demo-loan2x.jpg 2x" alt="loan" /></div>
                        <span className="nk-demo-title">
                            <em className="text-primary">Demo5</em><br />
                            <strong>Loan Management Panel</strong>
                        </span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo2/ecommerce/index.html">
                        <div className="nk-demo-image bg-dark"><img src="../../images/landing/demo-ecommerce.jpg" srcSet="../../images/landing/demo-ecommerce2x.jpg 2x" alt="Ecommerce" /></div>
                        <span className="nk-demo-title">
                            <em className="text-primary">Demo2</em><br />
                            <strong>E-Commerce Panel</strong>
                        </span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo2/lms/index.html">
                        <div className="nk-demo-image bg-danger"><img src="../../images/landing/demo-lms.jpg" srcSet="../../images/landing/demo-lms2x.jpg 2x" alt="LMS" /></div>
                        <span className="nk-demo-title">
                            <em className="text-primary">Demo2</em><br />
                            <strong>LMS / Learning Management System</strong>
                        </span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="index.html">
                        <div className="nk-demo-image bg-info"><img src="../../images/landing/demo-crm.jpg" srcSet="../../images/landing/demo-crm2x.jpg 2x" alt="CRM / Customer Relationship" /></div>
                        <span className="nk-demo-title">
                            <em className="text-primary">Demo1</em><br />
                            <strong>CRM / Customer Relationship Management</strong>
                        </span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo7/hospital/index.html">
                        <div className="nk-demo-image bg-indigo"><img src="../../images/landing/demo-hospital.jpg" srcSet="../../images/landing/demo-hospital2x.jpg 2x" alt="Hospital Managemen" /></div>
                        <span className="nk-demo-title">
                            <em className="text-primary">Demo7</em><br />
                            <strong>Hospital Management</strong>
                        </span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo1/hotel/index.html">
                        <div className="nk-demo-image bg-pink"><img src="../../images/landing/demo-hotel.jpg" srcSet="../../images/landing/demo-hotel2x.jpg 2x" alt="Hotel Managemen" /></div>
                        <span className="nk-demo-title">
                            <em className="text-primary">Demo1</em><br />
                            <strong>Hotel Management</strong>
                        </span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo3/cms/index.html">
                        <div className="nk-demo-image bg-dark"><img src="../../images/landing/demo-cms.jpg" srcSet="../../images/landing/demo-cms2x.jpg 2x" alt="cms" /></div>
                        <span className="nk-demo-title">
                            <em className="text-primary">Demo3</em><br />
                            <strong>CMS Panel</strong>
                        </span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo5/crypto/index.html">
                        <div className="nk-demo-image bg-warning"><img src="../../images/landing/demo-buysell.jpg" srcSet="../../images/landing/demo-buysell2x.jpg 2x" alt="Crypto BuySell / Wallet" /></div>
                        <span className="nk-demo-title">
                            <em className="text-primary">Demo5</em><br />
                            <strong>Crypto BuySell Panel</strong>
                        </span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo6/invest/index.html">
                        <div className="nk-demo-image bg-indigo"><img src="../../images/landing/demo-invest.jpg" srcSet="../../images/landing/demo-invest2x.jpg 2x" alt="HYIP / Investment" /></div>
                        <span className="nk-demo-title">
                            <em className="text-primary">Demo6</em><br />
                            <strong>HYIP / Investment Panel</strong>
                        </span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo3/apps/file-manager.html">
                        <div className="nk-demo-image bg-purple"><img src="../../images/landing/demo-file-manager.jpg" srcSet="../../images/landing/demo-file-manager2x.jpg 2x" alt="File Manager" /></div>
                        <span className="nk-demo-title">
                            <em className="text-primary">Demo3</em><br />
                            <strong>Apps - File Manager</strong>
                        </span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo4/subscription/index.html">
                        <div className="nk-demo-image bg-primary"><img src="../../images/landing/demo-subscription.jpg" srcSet="../../images/landing/demo-subscription2x.jpg 2x" alt="SAAS / Subscription" /></div>
                        <span className="nk-demo-title">
                            <em className="text-primary">Demo4</em><br />
                            <strong>SAAS / Subscription Panel</strong>
                        </span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/covid/index.html">
                        <div className="nk-demo-image bg-danger"><img src="../../images/landing/demo-covid19.jpg" srcSet="../../images/landing/demo-covid192x.jpg 2x" alt="Covid Situation" /></div>
                        <span className="nk-demo-title">
                            <em className="text-primary">Covid</em><br />
                            <strong>Coronavirus Situation</strong>
                        </span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo3/apps/messages.html">
                        <div className="nk-demo-image bg-success"><img src="../../images/landing/demo-messages.jpg" srcSet="../../images/landing/demo-messages2x.jpg 2x" alt="Messages" /></div>
                        <span className="nk-demo-title">
                            <em className="text-primary">Demo3</em><br />
                            <strong>Apps - Messages</strong>
                        </span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo3/apps/mailbox.html">
                        <div className="nk-demo-image bg-purple"><img src="../../images/landing/demo-inbox.jpg" srcSet="../../images/landing/demo-inbox2x.jpg 2x" alt="Inbox" /></div>
                        <span className="nk-demo-title">
                            <em className="text-primary">Demo3</em><br />
                            <strong>Apps - Mailbox</strong>
                        </span>
                    </a>
                </div>
                <div className="nk-demo-item">
                    <a href="https://dashlite.net/demo3/apps/chats.html">
                        <div className="nk-demo-image bg-purple"><img src="../../images/landing/demo-chats.jpg" srcSet="../../images/landing/demo-chats2x.jpg 2x" alt="Chats / Messenger" /></div>
                        <span className="nk-demo-title">
                            <em className="text-primary">Demo3</em><br />
                            <strong>Apps - Chats</strong>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div className="nk-demo-panel toggle-slide toggle-slide-right" data-content="settingPanel" data-toggle-overlay="true" data-toggle-body="true" data-toggle-screen="any">
            <div className="nk-demo-head">
                <h6 className="mb-0">Preview Settings</h6>
                <a className="nk-demo-close toggle btn btn-icon btn-trigger revarse mr-n2" data-target="settingPanel" href="index.html#"><em className="icon ni ni-cross"></em></a>
            </div>
            <div className="nk-opt-panel" data-simplebar>
                <div className="nk-opt-set">
                    <div className="nk-opt-set-title">Direction Change</div>
                    <div className="nk-opt-list col-2x">
                        <div className="nk-opt-item only-text active" data-key="dir" data-update="ltr">
                            <span className="nk-opt-item-bg"><span className="nk-opt-item-name">LTR Mode</span></span>
                        </div>
                        <div className="nk-opt-item only-text" data-key="dir" data-update="rtl">
                            <span className="nk-opt-item-bg"><span className="nk-opt-item-name">RTL Mode</span></span>
                        </div>
                    </div>
                </div>
                <div className="nk-opt-set">
                    <div className="nk-opt-set-title">Main UI Style</div>
                    <div className="nk-opt-list col-2x">
                        <div className="nk-opt-item only-text active" data-key="style" data-update="ui-default">
                            <span className="nk-opt-item-bg"><span className="nk-opt-item-name">Default</span></span>
                        </div>
                        <div className="nk-opt-item only-text" data-key="style" data-update="ui-clean">
                            <span className="nk-opt-item-bg"><span className="nk-opt-item-name">Clean</span></span>
                        </div>
                        <div className="nk-opt-item only-text" data-key="style" data-update="ui-shady">
                            <span className="nk-opt-item-bg"><span className="nk-opt-item-name">Shady</span></span>
                        </div>
                        <div className="nk-opt-item only-text" data-key="style" data-update="ui-softy">
                            <span className="nk-opt-item-bg"><span className="nk-opt-item-name">Softy</span></span>
                        </div>
                    </div>
                </div>
                <div className="nk-opt-set nk-opt-set-aside">
                    <div className="nk-opt-set-title">Sidebar Style</div>
                    <div className="nk-opt-list col-4x">
                        <div className="nk-opt-item" data-key="aside" data-update="is-light">
                            <span className="nk-opt-item-bg is-light"><span className="bg-lighter"></span></span><span className="nk-opt-item-name">White</span>
                        </div>
                        <div className="nk-opt-item" data-key="aside" data-update="is-default">
                            <span className="nk-opt-item-bg is-light"><span className="bg-light"></span></span><span className="nk-opt-item-name">Light</span>
                        </div>
                        <div className="nk-opt-item active" data-key="aside" data-update="is-dark">
                            <span className="nk-opt-item-bg"><span className="bg-dark"></span></span><span className="nk-opt-item-name">Dark</span>
                        </div>
                        <div className="nk-opt-item" data-key="aside" data-update="is-theme">
                            <span className="nk-opt-item-bg"><span className="bg-theme"></span></span><span className="nk-opt-item-name">Theme</span>
                        </div>
                    </div>
                </div>
                <div className="nk-opt-set nk-opt-set-header">
                    <div className="nk-opt-set-title">Header Style</div>
                    <div className="nk-opt-list col-4x">
                        <div className="nk-opt-item active" data-key="header" data-update="is-light">
                            <span className="nk-opt-item-bg is-light"><span className="bg-lighter"></span></span><span className="nk-opt-item-name">White</span>
                        </div>
                        <div className="nk-opt-item" data-key="header" data-update="is-default">
                            <span className="nk-opt-item-bg is-light"><span className="bg-light"></span></span><span className="nk-opt-item-name">Light</span>
                        </div>
                        <div className="nk-opt-item" data-key="header" data-update="is-dark">
                            <span className="nk-opt-item-bg"><span className="bg-dark"></span></span><span className="nk-opt-item-name">Dark</span>
                        </div>
                        <div className="nk-opt-item" data-key="header" data-update="is-theme">
                            <span className="nk-opt-item-bg"><span className="bg-theme"></span></span><span className="nk-opt-item-name">Theme</span>
                        </div>
                    </div>
                </div>
                <div className="nk-opt-set nk-opt-set-skin">
                    <div className="nk-opt-set-title">Primary Skin</div>
                    <div className="nk-opt-list">
                        <div className="nk-opt-item active" data-key="skin" data-update="default">
                            <span className="nk-opt-item-bg"><span className="skin-default"></span></span><span className="nk-opt-item-name">Default</span>
                        </div>
                        <div className="nk-opt-item" data-key="skin" data-update="blue">
                            <span className="nk-opt-item-bg"><span className="skin-blue"></span></span><span className="nk-opt-item-name">Blue</span>
                        </div>
                        <div className="nk-opt-item" data-key="skin" data-update="egyptian">
                            <span className="nk-opt-item-bg"><span className="skin-egyptian"></span></span><span className="nk-opt-item-name">Egyptian</span>
                        </div>
                        <div className="nk-opt-item" data-key="skin" data-update="purple">
                            <span className="nk-opt-item-bg"><span className="skin-purple"></span></span><span className="nk-opt-item-name">Purple</span>
                        </div>
                        <div className="nk-opt-item" data-key="skin" data-update="green">
                            <span className="nk-opt-item-bg"><span className="skin-green"></span></span><span className="nk-opt-item-name">Green</span>
                        </div>
                        <div className="nk-opt-item" data-key="skin" data-update="red">
                            <span className="nk-opt-item-bg"><span className="skin-red"></span></span><span className="nk-opt-item-name">Red</span>
                        </div>
                    </div>
                </div>
                <div className="nk-opt-set">
                    <div className="nk-opt-set-title">Skin Mode</div>
                    <div className="nk-opt-list col-2x">
                        <div className="nk-opt-item active" data-key="mode" data-update="light-mode">
                            <span className="nk-opt-item-bg is-light"><span className="theme-light"></span></span><span className="nk-opt-item-name">Light Skin</span>
                        </div>
                        <div className="nk-opt-item" data-key="mode" data-update="dark-mode">
                            <span className="nk-opt-item-bg"><span className="theme-dark"></span></span><span className="nk-opt-item-name">Dark Skin</span>
                        </div>
                    </div>
                </div>
                <div className="nk-opt-reset"><a href="index.html#" className="reset-opt-setting">Reset Setting</a></div>
            </div>
        </div>
        </>
    );
}
export default Main;
const Index = ReactDOM.createRoot(document.getElementById("app"));
Index.render(
    <React.StrictMode>
        <Main/>
    </React.StrictMode>
)




