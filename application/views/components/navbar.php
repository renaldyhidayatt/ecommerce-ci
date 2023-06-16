<nav class="bg-white border-gray-200 shadow-lg">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 relative">
        <a href="<?= base_url(); ?>" class="flex items-center">
            <span class="self-center text-2xl font-semibold whitespace-nowrap">
                Toko Online
            </span>
        </a>


        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-white md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent">
                <li>
                    <a href="<?= base_url(); ?>" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0" aria-current="page">Home</a>
                </li>
                <?php if (!empty($this->session->userdata('email'))) { ?>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto"><?= $this->session->userdata('email') ?> <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="<?= base_url('member/myProfile'); ?>" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('order/'); ?>" class="block px-4 py-2 hover:bg-gray-100">Orders</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('auth/logout'); ?>" class="block px-4 py-2 hover:bg-gray-100">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="<?= base_url('cart/'); ?>" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-gray-100 md:border-0 md:hover:text-blue-700 md:p-0">
                            <i class="fas fa-shopping-cart"></i> <?= $this->ModelCart->findByEmailCartRow($this->session->userdata('email')); ?>
                        </a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="<?= base_url('auth/register'); ?>" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Register</a>
                    </li>
                    <li>
                        <a href="<?= base_url('auth/login'); ?>" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Login</a>
                    </li>
                <?php } ?>


            </ul>
        </div>

    </div>
</nav>