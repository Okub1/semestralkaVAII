/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$(".game-info").on("click", function (e) {
    e.preventDefault();
    $.ajax('/api/games/' + e.target.id)
        .done(function( data ) {
        $("#infoModal .modal-title").text(data.name);
        $("#infoModal .modal-body").text(data.description);
    });
});

$(".genre-info").on("click", function (e) {
    e.preventDefault();
    $.ajax('/api/genres/' + e.target.id)
        .done(function( data ) {
            $("#infoModal .modal-title").text(data.name);
            $("#infoModal .modal-body").text(data.description);
        })
        .then(function () {
            $.ajax('/api/genres/games/' + e.target.id)
                .done(function (data) {
                    let content = "<h5 class='mt-4'>Hry ktore pouzivaju tento zaner</h5><table class='table table-striped'>";
                    //content += '<th>Meno</th>';
                    data.forEach(function (item) {
                        content += '<tr><td>' + item.name + '</td></tr>';
                    });
                    content += "</table>";
                    $("#infoModal .modal-body").append(content);
                });
        });
});

$(".clear-modal").on("click", function (e) {
    $("#infoModal .modal-title").text("");
    $("#infoModal .modal-body").text("Loading...");
});

$(".create-developer").on("click", function (e) {
    const name = $("#name").val();
    const description = $("#description").val();
    const address = $("#address").val();
    const _token = $('[name="_token"]').val();

    $.ajax(
        '/api/developers/create',
        {method:'POST', data: {name, description, address, _token}}
    ).done(function (data) {
            $('#developer_id').append(`<option value="${data.id}"> 
                                      ${data.name} </option>`);
            $('#developer_id').val(data.id);
        }
    ).then(function () {
        $('#developerModal').modal('hide');
    })
});

