var UsersData;
// import {AxiosInstance as axios} from "axios";
import Echo from 'laravel-echo'
import Pusher from "pusher-js"

window.Echo = new Echo({
  broadcaster: 'pusher',
  key: '7732e721d61a5955cd5c',
  cluster: 'ap2',
  forceTLS: true
});

Pusher.logToConsole = true;

var pusher = new Pusher('7732e721d61a5955cd5c', {
    cluster: 'ap2'
});


UsersData = new Vue({
    el: "#userDataTable",
    data: {
		userData: [],
		userDataCount: 0,
	},
    created() {
        this.userRegistrationData(1);
        this.listenForChanges();
    },
    methods: {
        userRegistrationData(page) {
            console.log("ABC")
            var data="";

            fetch('getRegisteredUsersData').then((res) => {
                return res.json();
            }).then((users) => {
                this.userData = users;
                this.userDataCount = users.length;
                console.log(this.userData);
            }).catch(error => {
                console.log(error)
            });

		},
        listenForChanges() {
            var channel = pusher.subscribe('user-dashboard');
            channel.bind('user.created', function(data) {
                UsersData.userRegistrationData(1);
            });
		},
    }
});

function RegisteredUsersDataSuccess(RegisteredUsers,status,xhr)
{
	UsersData.userData = RegisteredUsers;
}
