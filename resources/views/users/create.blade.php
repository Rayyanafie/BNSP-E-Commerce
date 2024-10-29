@extends('formlayout')
@section('form')
<div class="max-w-lg mx-auto p-6 bg-gray-100 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-center mb-4">User Information</h2>
    <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
        @csrf
        <!-- username -->
        <div>
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" name="username" id="username"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your username">
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your email">
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your password">
        </div>

        <!-- Birth Date -->
        <div>
            <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth Date</label>
            <input type="date" name="birth_date" id="birth_date"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Gender -->
        <div>
            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
            <select name="gender" id="gender"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                <option value="">Select your gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>

        <!-- Address -->
        <div>
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" name="address" id="address"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your address">
        </div>

        <!-- City -->
        <div>
            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
            <input type="text" name="city" id="city"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your city">
        </div>

        <!-- Phone -->
        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="tel" name="phone" id="phone"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your phone number">
        </div>

        <!-- PayPal ID -->
        <div>
            <label for="paypal_id" class="block text-sm font-medium text-gray-700">PayPal ID</label>
            <input type="text" name="paypal_id" id="paypal_id"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your PayPal ID">
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit"
                class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Submit</button>
        </div>
    </form>
</div>

@endsection