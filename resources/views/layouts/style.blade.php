<!-- load css -->
<style type="text/css">
    .modal-extra_lg {
        width: 85%;
    }

    @media only screen and (max-width: 575.98px) {
        .table-responsive-sm {
            display: block;
            width: 100%;
            overflow-x: auto;
            /* -webkit-overflow-scrolling: touch;
                -ms-overflow-style: -ms-autohiding-scrollbar; */
        }
    }

    .btn-secondary {
        color: #fff !important;
        background-color: #6c757d !important;
        border-color: #6c757d !important;
    }

    .bg-orangenom {
        color: #000;
        background-color: #ffd147;
        border-color: #ffd147;
    }

    .bg-biruenom {
        color: #000;
        background-color: #51bcfa;
        border-color: #51bcfa;
    }

    .panel-orange>.panel-heading {
        color: #fff;
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .panel-hijau>.panel-heading {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }

    .select2-container--default .select2-selection--single {
        border-radius: 0px !important
    }

    .select2-container .select2-selection--single {
        height: 35px
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #3c8dbc !important;
        border-color: #367fa9 !important;
        color: #fff !important;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: #fff !important;
    }

    .navbar-badge {
        font-size: .6rem;
        font-weight: 300;
        padding: 2px 4px;
        position: absolute;
        right: 5px;
        top: 9px;
    }

    .badge-warning {
        color: #1f2d3d;
        background-color: #ffc107;
    }

    .badge {
        display: inline-block;
        padding: .25em .4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .fa-bell:before {
        content: "\f0f3";
    }

    *,
    ::after,
    ::before {
        box-sizing: border-box;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 10rem;
        padding: .5rem 0;
        margin: .125rem 0 0;
        font-size: 1rem;
        color: #212529;
        text-align: left;
        list-style: none;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: .25rem;
        box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 18%);
    }

    .dropdown-menu-lg .dropdown-item {
        padding: .5rem 1rem;
    }

    .dropdown-footer,
    .dropdown-header {
        display: block;
        font-size: .875rem;
        padding: .5rem 1rem;
        text-align: center;
    }

    .dropdown-header {
        display: block;
        padding: .5rem 1rem;
        margin-bottom: 0;
        font-size: .875rem;
        color: #6c757d;
        white-space: nowrap;
    }

    .dropdown-item {
        display: block;
        width: 100%;
        padding: .25rem 1rem;
        clear: both;
        font-weight: 400;
        color: #212529;
        text-align: inherit;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
    }

    .dropdown-menu-lg {
        max-width: 300px;
        min-width: 280px;
        padding: 0;
    }

    #app-loading {
        position: fixed;
        z-index: 99999999;
        background: rgba(0, 0, 0, 0.8);
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
    }

    #app-loading .inner {
        color: #ffffff;
        font-weight: bold;
        font-size: 20px;
        width: 300px;
        margin: 20% auto;
    }
</style>

<style>
    .table thead {
        background-color: #d1d1d1 !important;
    }

    .table {
        font-size: 12px !important;
    }

    .table th {
        padding: 4px 2px !important;
        /* text-align: center !important; */
        vertical-align: middle !important;
        text-transform: capitalize !important;
    }

    .table td {
        padding: 4px 2px !important;
    }

    .modal-header {
        background-color: #DBDBDB !important;
        color: black !important;
    }
</style>
<style>
    .spinner-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 200px; /* Atur tinggi sesuai kebutuhan */
    }
</style>
