<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                         alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="<?= route('index'); ?>"
                           class="<?= urlIs(route('index')) ? "bg-gray-900 text-white rounded-md" : "text-gray-300 hover:bg-gray-700 hover:text-white rounded-md"; ?> px-3 py-2 text-sm font-medium"
                           aria-current="page">Index</a>
                        <a href="<?= route('todo'); ?>"
                           class="<?= urlIs(route('todo')) ? "bg-gray-900 text-white rounded-md" : "text-gray-300 hover:bg-gray-700 hover:text-white rounded-md"; ?> px-3 py-2 text-sm font-medium"
                        >ToDO</a>
                        <a href="404"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">404</a>
                        <a href="#"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Calendar</a>
                        <a href="#"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Reports</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <?php if (isGuest()) : ?>
                        <a href="<?= route('login.create'); ?>"
                           class="<?= urlIs(route('login.create')) ? "bg-gray-900 text-white rounded-md" : "text-gray-300 hover:bg-gray-700 hover:text-white rounded-md"; ?> px-3 py-2 text-sm font-medium"
                        >Login</a>
                        <a href="<?= route('register'); ?>"
                           class="<?= urlIs(route('register')) ? "bg-gray-900 text-white rounded-md" : "text-gray-300 hover:bg-gray-700 hover:text-white rounded-md"; ?> px-3 py-2 text-sm font-medium"
                        >Registration</a>
                    <?php else: ?>
                        <form method="post" action="<?= route('login.delete'); ?>">
                            <?=method("delete");?>
                            <button
                                class="<?= urlIs(route('login.delete')) ? "bg-gray-900 text-white rounded-md" : "text-gray-300 hover:bg-gray-700 hover:text-white rounded-md"; ?> px-3 py-2 text-sm font-medium"
                            >LogOut</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>