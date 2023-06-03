<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("You're logged in!") }} --}}
                    <div id=userDataTable>
                        <div class="table-responsive">
                            <div class="user_counter">
                                <span class="userCountLable">Number Of User : </span><span class="userCountLable">@{{ userDataCount }}</span>
                            </div>
                            <table class="table user-listing-table">
                                <thead>
                                    <tr>
                                        <th>Name </th>
                                        <th>Email </th>
                                        <th>Created</th>
                                        <th>Last modified</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr v-for="transaction in productServiceTransacrion.data"> --}}
                                    <tr v-for="user in userData">
                                        <th>@{{ user.name }}</th>
                                        <td>@{{ user.email }} </td>
                                        <td>@{{ user.created_at }} </td>
                                        <td>@{{ user.updated_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
