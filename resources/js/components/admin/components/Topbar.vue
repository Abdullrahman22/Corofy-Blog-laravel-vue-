<template>
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="POST">
                        <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                        <button class="au-btn--submit" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                    <div class="header-button">
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="image">
                                    <img src="/admin_assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                </div>
                                <div class="content">
                                    <p> 
                                        john doe
                                        <i class="fas fa-chevron-down"></i>
                                    </p>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <span>
                                                <img src="/admin_assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                            </span>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <span>john doe</span>
                                            </h5>
                                            <span class="email">johndoe@example.com</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <router-link to="/admin/account">
                                                <i class="zmdi zmdi-account"></i>
                                                Account
                                            </router-link>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <router-link to="/admin/setting">
                                                <i class="zmdi zmdi-settings"></i>
                                                Setting
                                            </router-link>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="admin/#">
                                            <i class="zmdi zmdi-power"></i>
                                            Logout
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
    export default {
        name: 'Topbar'
    }
</script>