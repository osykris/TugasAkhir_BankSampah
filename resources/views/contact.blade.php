@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
@section('title')
SEMANDING
@endsection

<style>
    .elementor-section {
        position: relative;
    }

    .elementor *,
    .elementor :after,
    .elementor :before {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    article,
    aside,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    main,
    nav,
    section {
        display: block;
    }

    .elementor-row {
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }

    .elementor-row {
        width: 100%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
    }

    .elementor-column.elementor-col-100,
    .elementor-column[data-col="100"] {
        width: 100%;
    }

    .elementor-column,
    .elementor-column-wrap {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
    }

    .elementor-column {
        min-height: 1px;
    }

    .elementor-column-wrap {
        width: 100%;
    }

    .elementor-column,
    .elementor-column-wrap {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
    }

    .elementor:not(.elementor-bc-flex-widget) .elementor-widget-wrap {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
    }

    .elementor-widget-wrap {
        position: relative;
        width: 100%;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -ms-flex-line-pack: start;
        align-content: flex-start;
    }

    .elementor-widget-wrap>.elementor-element {
        width: 100%;
    }

    .elementor-widget {
        position: relative;
    }

    .elementor-align-left {
        text-align: left;
    }

    .elementor *,
    .elementor :after,
    .elementor :before {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .elementor-62 .elementor-element.elementor-element-eb49744>.elementor-widget-container {
        margin: -34px 0px 0px 0px;
    }

    .elementor *,
    .elementor :after,
    .elementor :before {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .default-padding {
        padding-top: 120px;
        padding-bottom: 120px;
    }

    .default-padding,
    .default-padding-top,
    .default-padding-bottom,
    .default-padding-mx {
        position: relative;
        z-index: 1;
    }


    .elementor-section .elementor-container {
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }

    .elementor-section .elementor-container {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-right: auto;
        margin-left: auto;
        position: relative;
    }

    .elementor *,
    .elementor :after,
    .elementor :before {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }

    .col,
    .col-1,
    .col-10,
    .col-11,
    .col-12,
    .col-2,
    .col-3,
    .col-4,
    .col-5,
    .col-6,
    .col-7,
    .col-8,
    .col-9,
    .col-auto,
    .col-lg,
    .col-lg-1,
    .col-lg-10,
    .col-lg-11,
    .col-lg-12,
    .col-lg-2,
    .col-lg-3,
    .col-lg-4,
    .col-lg-5,
    .col-lg-6,
    .col-lg-7,
    .col-lg-8,
    .col-lg-9,
    .col-lg-auto,
    .col-md,
    .col-md-1,
    .col-md-10,
    .col-md-11,
    .col-md-12,
    .col-md-2,
    .col-md-3,
    .col-md-4,
    .col-md-5,
    .col-md-6,
    .col-md-7,
    .col-md-8,
    .col-md-9,
    .col-md-auto,
    .col-sm,
    .col-sm-1,
    .col-sm-10,
    .col-sm-11,
    .col-sm-12,
    .col-sm-2,
    .col-sm-3,
    .col-sm-4,
    .col-sm-5,
    .col-sm-6,
    .col-sm-7,
    .col-sm-8,
    .col-sm-9,
    .col-sm-auto,
    .col-xl,
    .col-xl-1,
    .col-xl-10,
    .col-xl-11,
    .col-xl-12,
    .col-xl-2,
    .col-xl-3,
    .col-xl-4,
    .col-xl-5,
    .col-xl-6,
    .col-xl-7,
    .col-xl-8,
    .col-xl-9,
    .col-xl-auto {
        position: relative;
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-control {
        display: block;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    input {
        border: 1px solid #e7e7e7;
        border-radius: inherit;
        box-shadow: inherit;
        min-height: 50px;
    }

    button,
    input {
        overflow: visible;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    .contact-form-area .contact-forms input,
    .contact-form-area .contact-forms textarea {
        border: 1px solid #e7e7e7;
        box-shadow: inherit;
        border-radius: inherit;
        padding-left: 15px;
    }

    .contact-form-area .address-info .address-items ul li i {
        display: inline-block;
        font-size: 30px;
        height: 80px;
        width: 80px;
        background: #fafafa;
        line-height: 80px;
        margin-right: 25px;
        color: #071C4D;
        border: 1px dashed #071C4D;
        border-radius: 50%;
    }

    .wpcf7 form.init .wpcf7-response-output,
    .wpcf7 form.resetting .wpcf7-response-output,
    .wpcf7 form.submitting .wpcf7-response-output {
        display: none;
    }

    .wpcf7 form .wpcf7-response-output {
        margin: 2em 0.5em 1em;
        padding: 0.2em 1em;
        border: 2px solid #00a0d2;
    }

    div.wpcf7-response-output {
        margin: 10px 0 0 0;
    }

    .contact-form-area input.wpcf7-submit {
        background: no-repeat;
        border: 2px solid #e7e7e7 !important;
        padding: 10px 30px;
        font-weight: 700;
        border-radius: 30px;
        margin-top: 15px;
        min-height: 50px;
    }

    .contact-form-area .contact-forms input,
    .contact-form-area .contact-forms textarea {
        border: 1px solid #e7e7e7;
        box-shadow: inherit;
        border-radius: inherit;
        padding-left: 15px;
    }

    [type=button]:not(:disabled),
    [type=reset]:not(:disabled),
    [type=submit]:not(:disabled),
    button:not(:disabled) {
        cursor: pointer;
    }

    .hibiscus .contact-form-area .address-info .address-items ul li i {
        color: #009DFB;
    }

    .contact-form-area .address-info .address-items ul li i {
        margin-right: 0;
        margin-bottom: 15px;
    }

    .contact-form-area .address-info .address-items ul li p {
        font-size: 18px;
        font-weight: 700;
        color: #232323;
    }

    .contact-form-area .address-info .address-items ul li p span {
        display: block;
        font-size: 16px;
        font-weight: 400;
        color: #666666;
    }

    .fa-map-marker-alt:before {
        content: "\f3c5";
    }

    ul {
        margin: 0;
        list-style-type: none;
    }

    dl,
    ol,
    ul {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    ol,
    ul {
        overflow-wrap: break-word;
    }

    .hibiscus .contact-form-area .address-info .address-items ul li i {
        color: #009DFB;
    }

    .contact-form-area .address-info .address-items ul li i {
        display: inline-block;
        font-size: 30px;
        height: 80px;
        width: 80px;
        text-align: center;
        background: #fafafa;
        line-height: 80px;
        margin-right: 25px;
        color: #071C4D;
        border: 1px dashed #071C4D;
        border-radius: 50%;
    }

    .contact-form-area .address-info .address-items ul li i {
        margin-right: 0;
        margin-bottom: 15px;
    }

    .elementor *,
    .elementor :after,
    .elementor :before {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .contact-form-area input.wpcf7-submit {
        background: no-repeat;
        border: 2px solid #071C4D !important;
        padding: 10px 30px;
        font-weight: 700;
        border-radius: 30px;
        margin-top: 15px;
        min-height: 50px;
    }

    .contact-form-area .contact-forms input,
    .contact-form-area .contact-forms textarea {
        border: 1px solid #e7e7e7;
        box-shadow: inherit;
        border-radius: inherit;
        padding-left: 15px;
    }

    [type=button]:not(:disabled),
    [type=reset]:not(:disabled),
    [type=submit]:not(:disabled),
    button:not(:disabled) {
        cursor: pointer;
    }

    .elementor *,
    .elementor :after,
    .elementor :before {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    [type=button],
    [type=reset],
    [type=submit],
    button {
        -webkit-appearance: button;
    }

    input {
        border: 1px solid #e7e7e7;
        border-radius: inherit;
        box-shadow: inherit;
        min-height: 50px;
    }

    button,
    input {
        overflow: visible;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    * {
        padding: 0;
        margin: 0;
    }

    *,
    ::after,
    ::before {
        box-sizing: border-box;
    }

    user agent stylesheet input[type="submit"i] {
        appearance: auto;
        user-select: none;
        white-space: pre;
        align-items: flex-start;
        text-align: center;
        cursor: default;
        box-sizing: border-box;
        background-color: -internal-light-dark(rgb(239, 239, 239), rgb(59, 59, 59));
        color: -internal-light-dark(black, white);
        padding: 1px 6px;
        border-width: 2px;
        border-style: outset;
        border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
        border-image: initial;
    }

    user agent stylesheet input {
        writing-mode: horizontal-tb !important;
        text-rendering: auto;
        color: -internal-light-dark(black, white);
        letter-spacing: normal;
        word-spacing: normal;
        line-height: normal;
        text-transform: none;
        text-indent: 0px;
        text-shadow: none;
        display: inline-block;
        text-align: start;
        appearance: auto;
        -webkit-rtl-ordering: logical;
        cursor: text;
        background-color: -internal-light-dark(rgb(255, 255, 255), rgb(59, 59, 59));
        margin: 0em;
        padding: 1px 2px;
        border-width: 2px;
        border-style: inset;
        border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
        border-image: initial;
    }

    p {
        color: #666666;
        margin: 0 0 0px;
        text-transform: none;
        font-weight: 400;
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    p {
        overflow-wrap: break-word;
    }

    .wpcf7 form.init .wpcf7-response-output,
    .wpcf7 form.resetting .wpcf7-response-output,
    .wpcf7 form.submitting .wpcf7-response-output {
        display: none;
    }

    .wpcf7 form .wpcf7-response-output {
        margin: 2em 0.5em 1em;
        padding: 0.2em 1em;
        border: 2px solid #e7e7e7;
    }

    div.wpcf7-response-output {
        margin: 10px 0 0 0;
    }

    .contact-form-area .address-info .address-items ul li {
        display: flex;
        margin-bottom: 30px;
        align-items: center;
    }

    .contact-form-area .address-info .address-items ul li {
        display: block;
        margin-bottom: 30px;
        align-items: center;
        text-align: center;
    }

    .contact-form-area .address-info {
        padding-left: 50px;
    }

    .contact-form-area .address-info {
        padding-left: 15px;
        margin-top: 50px;
    }
</style>

@section('content')
<header class="text-center">
    <h1>
        Kontak Kami
    </h1>
    <p class="mt-3">
        Isi form berikut untuk menghubungi kami.
    </p>
</header>
<section class="elementor-section elementor-top-section elementor-element elementor-element-7e1cc14 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="7e1cc14" data-element_type="section">
    <div class="elementor-container elementor-column-gap-no">
        <div class="elementor-row">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b55157b" data-id="b55157b" data-element_type="column">
                <div class="elementor-column-wrap elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-element elementor-element-eb49744 elementor-align-left elementor-widget elementor-widget-bdevs-contact" data-id="eb49744" data-element_type="widget" data-widget_type="bdevs-contact.default">
                            <div class="elementor-widget-container">
                                <div class="contact-form-area default-padding">
                                    <div class="container">
                                        <div class="row align-center">
                                            <!-- Start Contact Form -->
                                            <div class="col-lg-7 contact-forms">
                                                <div class="content">
                                                    <div role="form" class="wpcf7" id="wpcf7-f123-p62-o1" lang="en-US" dir="ltr">
                                                        <div class="screen-reader-response">
                                                            <p role="status" aria-live="polite" aria-atomic="true"></p>
                                                            <ul></ul>
                                                        </div>
                                                        <form action="/kontak/#wpcf7-f123-p62-o1" method="post" class="wpcf7-form init" novalidate="novalidate" data-status="init">
                                                            <div style="display: none;">
                                                                <input type="hidden" name="_wpcf7" value="123" />
                                                                <input type="hidden" name="_wpcf7_version" value="5.5.6" />
                                                                <input type="hidden" name="_wpcf7_locale" value="en_US" />
                                                                <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f123-p62-o1" />
                                                                <input type="hidden" name="_wpcf7_container_post" value="62" />
                                                                <input type="hidden" name="_wpcf7_posted_data_hash" value="" />
                                                            </div>
                                                            <div class="contact-form">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <span class="wpcf7-form-control-wrap names"><input type="text" name="names" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Nama" /></span><br />
                                                                            <span class="alert-error"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <span class="wpcf7-form-control-wrap email"><input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" aria-required="true" aria-invalid="false" placeholder="Email" /></span><br />
                                                                            <span class="alert-error"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <span class="wpcf7-form-control-wrap phone"><input type="text" name="phone" value="" size="40" class="wpcf7-form-control wpcf7-text form-control" aria-invalid="false" placeholder="No. HP" /></span><br />
                                                                            <span class="alert-error"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group comments">
                                                                            <span class="wpcf7-form-control-wrap comments"><textarea name="comments" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required form-control" id="comments" aria-required="true" aria-invalid="false" placeholder="Pesan...."></textarea></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <input type="submit" value="Kirim pesan" class="wpcf7-form-control has-spinner wpcf7-submit" id="submit" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="wpcf7-response-output" aria-hidden="true"></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Contact Form -->
                                            <div class="col-lg-5 address-info">
                                                <div class="address-items">
                                                    <ul>
                                                        <li>
                                                            <div class="row">
                                                                <div class="col md-0">
                                                                    <i class="fa fa-location-arrow"></i>
                                                                </div>
                                                                <div class="col">
                                                                    <p style="text-align: left; margin-left: -70px;">
                                                                        Lokasi Kami
                                                                        <span>Bogor, Indonesia</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="row">
                                                                <div class="col md-0">
                                                                    <i class="fa fa-wechat"></i>
                                                                </div>
                                                                <div class="col">
                                                                    <p style="text-align: left; margin-left: -70px;">
                                                                        Kirim Email Kami
                                                                        <span>contact@inovasimuda.org</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="row">
                                                                <div class="col md-0">
                                                                    <i class="	fa fa-phone"></i>
                                                                </div>
                                                                <div class="col">
                                                                    <p style="text-align: left; margin-left: -70px;">
                                                                        Hubungi Kami
                                                                        <span>+456 456 4443</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-e50beb4 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="e50beb4" data-element_type="section">
    <div class="elementor-container elementor-column-gap-no">
        <div class="elementor-row">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-92d747a" data-id="92d747a" data-element_type="column">
                <div class="elementor-column-wrap elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-element elementor-element-5cbc9c5 elementor-align-left elementor-widget elementor-widget-bdevs-map" data-id="5cbc9c5" data-element_type="widget" data-widget_type="bdevs-map.default">
                            <div class="elementor-widget-container">
                                <div class="maps-area">
                                    <div class="google-maps">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63196.8780489645!2d112.16685083003105!3d-8.121339281413203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78eb71ce21ec77%3A0xe54bebf2c6a8daa9!2sKanigoro%2C%20Kec.%20Kanigoro%2C%20Kabupaten%20Blitar%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1646806303165!5m2!1sid!2sid" width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection