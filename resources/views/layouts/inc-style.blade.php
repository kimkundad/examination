<!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/images/favicon.png') }}">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ url('assets/vendor/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/owl-carousel/css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <style>
    body, h1, h2, h3, h4, h5, h6, p, span, a{
    font-family: 'Prompt', sans-serif;

}
.header .navbar-brand img {
    max-width: 200px;
}
    .signin-btn .btn {
  color: #fff !important;
}
.footer {
    border-top: 1px solid #f7fbfe;
    background: #3b464e;
    padding: 27px 0px;
}
.btn-outline-primary:hover {
    color: #fff !important;
    background-color: #1652F0;
    border-color: #1652F0;
}
.btn-outline-primary {
    color: #1652F0 !important;
    border-color: #1652F0;
}
.invalid-feedback {
     display: block; 
    width: 100%;
    margin-top: 0.25rem;
    font-size: 80%;
    color: #FF788E;
}
.header {
    padding: 20px 0px;
    background: #fff;
    border-bottom: 1px solid #f1f4f8;
    transition: all 0.3s ease-in-out;
    z-index: 999;
    position: inherit;
    left: 0;
    right: 0;
    top: 0;
}
#main-wrapper {
    opacity: 0;
    transition: all 0.25s ease-in;
    overflow: hidden;
    position: relative;
    z-index: 1;
    margin-top: 0px;
}
@media (max-width: 768px){
    .m_h{
        display:none;
    }
    .section-padding {
    padding: 30px 0px;
}
}

@media (max-width: 576px){
    .section-title2 {
    margin-bottom: 25px;
}
    .m_h{
        display:none;
    }
    .section-padding {
    padding: 30px 0px;
}
.ban_top{
    padding-top:0px;
}
.box_search{
         margin-top: -30px;
}
h2, .h2 {
    font-size: 1.2rem;
}
p{
    font-size: 0.8rem;
}
.table th, .table td {
    font-size: 0.8rem;
}
h3, .h3 {
    font-size: 1.1rem;
}
}

@media (min-width: 1200px){
    .d_h{
        display:none;
    }
}

@media (min-width: 992px){
    .d_h{
        display:none;
    }
}


    </style>
