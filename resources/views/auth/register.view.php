<?php require_once base_path('resources/views/components/header.php')?>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-300">Sign up for a new account</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="/register" method="POST">
            <div>
                <label for="username" class="block text-sm font-medium leading-6 text-gray-300">Username</label>
                <div class="mt-2">
                    <input
                            id="username"
                            name="username"
                            type="text"
                            autocomplete="username"
                            required
                            class="block px-2 w-full rounded-md border-0 py-1.5 bg-gray-900  shadow-sm ring-1 ring-inset text-white ring-gray-700 placeholder:text-gray-400 outline-0  sm:text-sm sm:leading-6">
                </div>
            </div>


            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-300">Email address</label>
                <div class="mt-2">
                    <input
                            id="email"
                            name="email"
                            type="email"
                            autocomplete="email"
                            required
                            class="block px-2 w-full rounded-md border-0 py-1.5 bg-gray-900  shadow-sm ring-1 ring-inset text-white ring-gray-700 placeholder:text-gray-400 outline-0  sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-300">Password</label>

                </div>
                <div class="mt-2">
                    <input
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            required
                            class="block px-2 w-full rounded-md border-0 py-1.5 bg-gray-900  shadow-sm ring-1 ring-inset text-white ring-gray-700 placeholder:text-gray-400 outline-0  sm:text-sm sm:leading-6">
                </div>
                <?php if(isset($_SESSION['error']) ?? ''):  ?>
                    <h1 class="text-sm text-red-500 font-bold"><?php echo $_SESSION['error']?></h1>
                <?php endif; ?>
                <?php if(isset($_SESSION['connection']) ?? ''):  ?>
                    <h1 class="text-sm text-red-500 font-bold"><?php echo $_SESSION['connection']?></h1>
                <?php endif; ?>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
            Already a member?
            <a href="/login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Get your ass in </a>
        </p>
    </div>
</div>


<?php require_once base_path('resources/views/components/footer.php')?>
