<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo WEB_TITLE;?></title>
<link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
<link rel="stylesheet" href="assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/shared/style.css">
<link rel="stylesheet" href="assets/css/demo_1/style.css">
<link rel="shortcut icon" href="<?php echo IMAGE_URL; ?>favicon.png" />
<style type="text/css">
  .card .card-title {
      font-size:20px;
  }
  .resTable {
      width: 100%;
      overflow-x: scroll;
  }
  .activerow
  {
      background: #ebeaec38;
  }
  table td
  {
    white-space: normal !important;
    text-align: justify;
  }
  .msg_success {
      width: 100%;
      background-color: #1080104a;
      padding: 10px;
      font-size: 14px;
      margin: 0 13px 0 13px;
  }
  .msg_error {
      width: 100%;
      background-color: #e656416e;
      padding: 10px;
      font-size: 14px;
      margin: 0 13px 0 13px;
  }
  .profile-brief {
	border-left: 3px solid #eee;
	padding-left: 15px
}
.profile-tab {
	background: #f9f9f9;
	margin: 0 -15px 25px;
	padding: 30px 15px 0;
	font-weight: 600
}
.profile-tab>li>a {
	color: #888;
	-webkit-border-radius: 2px 2px 0 0;
	-moz-border-radius: 2px 2px 0 0;
	border-radius: 2px 2px 0 0
}
.profile-tab>li>a:hover {
	color: #666
}
.profile-tab>li.active>a {
	color: #444
}
.profile-tab>li+li {
	margin-left: 5px
}
.profile-tab-content {
	overflow: visible
}
.profile-tab-content .stream-list {
	border-top: 0;
	margin-top: 0
}

.dataTables_wrapper {
	overflow: hidden
}
.dataTables_wrapper select, .dataTables_wrapper input, .dataTables_wrapper label {
	margin: 0
}
.dataTables_wrapper select, .dataTables_wrapper input {
	margin: 0 0 0 5px
}
.dataTables_wrapper>div {
	float: left;
	margin: 0 0 15px 15px
}
.dataTables_wrapper>div+div {
	float: right;
	margin: 0 15px 15px 0
}
.dataTables_wrapper table+div, .dataTables_wrapper table+div+div {
	margin-top: 15px;
	margin-bottom: 0
}
.dataTables_wrapper table th {
	background: #f5f5f5;
	cursor: pointer
}
.dataTables_wrapper table th:focus {
	outline: 0
}
.dataTables_wrapper table th.sorting_asc, .dataTables_wrapper table th.sorting_desc {
	background: #f0f0f0;
	-webkit-box-shadow: 0 0 5px rgba(0,0,0,0.1) inset;
	-moz-box-shadow: 0 0 5px rgba(0,0,0,0.1) inset;
	box-shadow: 0 0 5px rgba(0,0,0,0.1) inset
}
.dataTables_wrapper table tr:hover th {
	background: #f1f1f1;
	background: -moz-linear-gradient(top, #fafafa 0, #fafafa 50%, #f1f1f1 51%, #f1f1f1 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fafafa), color-stop(50%, #fafafa), color-stop(51%, #f1f1f1), color-stop(100%, #f1f1f1));
	background: -webkit-linear-gradient(top, #fafafa 0, #fafafa 50%, #f1f1f1 51%, #f1f1f1 100%);
	background: -o-linear-gradient(top, #fafafa 0, #fafafa 50%, #f1f1f1 51%, #f1f1f1 100%);
	background: -ms-linear-gradient(top, #fafafa 0, #fafafa 50%, #f1f1f1 51%, #f1f1f1 100%);
	background: linear-gradient(to bottom, #fafafa 0, #fafafa 50%, #f1f1f1 51%, #f1f1f1 100%);
filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='@topColor', endColorstr='@bottomColor', GradientType=0)
}
.dataTables_wrapper table tr:hover th.sorting_asc, .dataTables_wrapper table tr:hover th.sorting_desc {
	background: #f0f0f0
}

.dataTables_wrapper .table-bordered {
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0;
	border-left: 0;
	border-right: 0
}
.dataTables_wrapper .table-bordered thead tr>th:first-child, .dataTables_wrapper .table-bordered tbody tr>td:first-child, .dataTables_wrapper .table-bordered tfoot tr>td:first-child, .dataTables_wrapper .table-bordered tfoot tr>th:first-child {
	border-left: 0
}
.dataTables_wrapper .table-bordered thead:first-child tr:first-child>th:first-child, .dataTables_wrapper .table-bordered tbody:first-child tr:first-child>td:first-child {
	-webkit-border-top-left-radius: 0;
	-moz-border-radius-topleft: 0;
	border-top-left-radius: 0
}
.dataTables_wrapper .table-bordered thead:first-child tr:first-child>th:last-child, .dataTables_wrapper .table-bordered tbody:first-child tr:first-child>td:last-child {
	-webkit-border-top-right-radius: 0;
	-moz-border-radius-topright: 0;
	border-top-right-radius: 0
}
.dataTables_wrapper .table-bordered thead:last-child tr:last-child>th:first-child, .dataTables_wrapper .table-bordered tbody:last-child tr:last-child>td:first-child, .dataTables_wrapper .table-bordered tfoot:last-child tr:last-child>td:first-child {
	-webkit-border-bottom-left-radius: 0;
	-moz-border-radius-bottomleft: 0;
	border-bottom-left-radius: 0
}
.dataTables_wrapper .table-bordered thead:last-child tr:last-child>th:last-child, .dataTables_wrapper .table-bordered tbody:last-child tr:last-child>td:last-child, .dataTables_wrapper .table-bordered tfoot:last-child tr:last-child>td:last-child {
	-webkit-border-bottom-right-radius: 0;
	-moz-border-radius-bottomright: 0;
	border-bottom-right-radius: 0
}
.dataTables_info {
	float: left;
	padding-top: 5px
}
.datatable-pagination {
	float: right
}
.datatable-pagination>a {
	
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0;
	cursor: pointer;
	display: inline-block;
	line-height: 20px;
	height: 30px;
	background-color: #f5f5f5;
	
	padding: 4px 12px;
	text-align: center;
	text-decoration: none!important;
	text-shadow: 0 1px 1px rgba(255,255,255,0.75);
	vertical-align: middle
}
.datatable-pagination>a+a {
	margin-left: -1px
}
.datatable-pagination>a:first-child {
	-webkit-border-top-left-radius: 3px;
	-moz-border-radius-topleft: 3px;
	border-top-left-radius: 3px;
	-webkit-border-bottom-left-radius: 3px;
	-moz-border-radius-bottomleft: 3px;
	border-bottom-left-radius: 3px
}
.datatable-pagination>a:last-child {
	-webkit-border-top-right-radius: 3px;
	-moz-border-radius-topright: 3px;
	border-top-right-radius: 3px;
	-webkit-border-bottom-right-radius: 3px;
	-moz-border-radius-bottomright: 3px;
	border-bottom-right-radius: 3px
}
.datatable-pagination>a:hover {
	background-color: #efefef;
	background-image: -moz-linear-gradient(top, #f5f5f5, #e6e6e6);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#f5f5f5), to(#e6e6e6));
	background-image: -webkit-linear-gradient(top, #f5f5f5, #e6e6e6);
	background-image: -o-linear-gradient(top, #f5f5f5, #e6e6e6);
	background-image: linear-gradient(to bottom, #f5f5f5, #e6e6e6);
	background-repeat: repeat-x;
filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff5f5f5', endColorstr='#ffe6e6e6', GradientType=0)
}
.datatable-pagination>a.paginate_disabled_previous, .datatable-pagination>a.paginate_disabled_next {
	cursor: default
}
.datatable-pagination>a.paginate_disabled_previous i, .datatable-pagination>a.paginate_disabled_next i {
	opacity: .5;
	filter: alpha(opacity=50)
}
.datatable-pagination>a span {
	display: none
}
</style>
    
   