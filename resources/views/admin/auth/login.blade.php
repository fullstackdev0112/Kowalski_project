<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - {{env('APP_NAME')}}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('adminhtml/assets/css/tailwind.output.css')}}" />
</head>
<body>
<div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
            <div class="h-32 md:h-auto md:w-1/2">
                <img
                    aria-hidden="true"
                    class="object-cover w-full h-full dark:hidden"
                    src="{{asset('adminhtml/assets/img/login-office.jpeg')}}"
                    alt="Admin Login"/>
                <img aria-hidden="true"
                    class="hidden object-cover w-full h-full dark:block"
                    src="{{asset('adminhtml/assets/img/login-office-dark.jpeg')}}"
                    alt="Admin Login"/>
            </div>
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                <div class="w-full">
                    <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                        {{env('APP_NAME')}} Admin Login
                    </h1>
                    <form action="{{route('admin.login.post')}}" method="post" autocomplete="off">
                        @csrf
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Username</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                   placeholder="Jane Doe" type="text" name="username" required/>
                            @error('username')
                            <span class="text-xs text-red-600 dark:text-red-400">
                              {{$message}}
                            </span>
                            @enderror
                        </label>
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Password</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                   placeholder="***************"
                                   type="password" name="password" required/>
                            @error('password')
                            <span class="text-xs text-red-600 dark:text-red-400">
                              {{$message}}
                            </span>
                            @enderror
                        </label>

                        <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Log in
                        </button>
                    </form>

                    <hr class="my-8" />

                    <p class="mt-4">
                        <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                            href="{{route('admin.forgot.password')}}">
                            Forgot your password?
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
