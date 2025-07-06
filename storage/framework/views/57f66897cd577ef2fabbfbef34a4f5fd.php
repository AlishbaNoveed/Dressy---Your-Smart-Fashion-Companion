<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Dressy')); ?></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Dressy" />
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/logo.png')); ?>" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link 
          href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
          rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Allura&amp;display=swap" rel="stylesheet">
   
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


   <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/swiper.min.css')); ?>" type="text/css" />
   <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" type="text/css" />
   <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/sweetalert.min.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>" type="text/css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
         integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
         crossorigin="anonymous" referrerpolicy="no-referrer">
    <?php echo $__env->yieldPushContent("styles"); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</head>

<body class="gradient-bg">
  <svg class="d-none">
    <symbol id="icon_nav" viewBox="0 0 25 18">
      <rect width="25" height="2" />
      <rect y="8" width="20" height="2" />
      <rect y="16" width="25" height="2" />
    </symbol>
    <symbol id="icon_facebook" viewBox="0 0 9 15">
      <path
        d="M7.62891 8.31543L8.01172 5.7998H5.57812V4.15918C5.57812 3.44824 5.90625 2.79199 7 2.79199H8.12109V0.631836C8.12109 0.631836 7.10938 0.44043 6.15234 0.44043C4.15625 0.44043 2.84375 1.6709 2.84375 3.8584V5.7998H0.601562V8.31543H2.84375V14.4404H5.57812V8.31543H7.62891Z" />
    </symbol>
    <symbol id="icon_twitter" viewBox="0 0 14 13">
      <path
        d="M12.5508 3.59668C13.0977 3.18652 13.5898 2.69434 13.9727 2.12012C13.4805 2.33887 12.9062 2.50293 12.332 2.55762C12.9336 2.20215 13.3711 1.65527 13.5898 0.97168C13.043 1.2998 12.4141 1.5459 11.7852 1.68262C11.2383 1.1084 10.5 0.780273 9.67969 0.780273C8.09375 0.780273 6.80859 2.06543 6.80859 3.65137C6.80859 3.87012 6.83594 4.08887 6.89062 4.30762C4.51172 4.1709 2.37891 3.02246 0.957031 1.2998C0.710938 1.70996 0.574219 2.20215 0.574219 2.74902C0.574219 3.7334 1.06641 4.6084 1.85938 5.12793C1.39453 5.10059 0.929688 4.99121 0.546875 4.77246V4.7998C0.546875 6.19434 1.53125 7.34277 2.84375 7.61621C2.625 7.6709 2.35156 7.72559 2.10547 7.72559C1.91406 7.72559 1.75 7.69824 1.55859 7.6709C1.91406 8.81934 2.98047 9.63965 4.23828 9.66699C3.25391 10.4326 2.02344 10.8975 0.683594 10.8975C0.4375 10.8975 0.21875 10.8701 0 10.8428C1.25781 11.6631 2.76172 12.1279 4.40234 12.1279C9.67969 12.1279 12.5508 7.78027 12.5508 3.97949C12.5508 3.84277 12.5508 3.7334 12.5508 3.59668Z" />
    </symbol>
    <symbol id="icon_instagram" viewBox="0 0 15 15">
      <path
        d="M7.125 3.2959C5.375 3.2959 3.98047 4.71777 3.98047 6.44043C3.98047 8.19043 5.375 9.58496 7.125 9.58496C8.84766 9.58496 10.2695 8.19043 10.2695 6.44043C10.2695 4.71777 8.84766 3.2959 7.125 3.2959ZM7.125 8.49121C6.00391 8.49121 5.07422 7.58887 5.07422 6.44043C5.07422 5.31934 5.97656 4.41699 7.125 4.41699C8.24609 4.41699 9.14844 5.31934 9.14844 6.44043C9.14844 7.58887 8.24609 8.49121 7.125 8.49121ZM11.1172 3.18652C11.1172 2.77637 10.7891 2.44824 10.3789 2.44824C9.96875 2.44824 9.64062 2.77637 9.64062 3.18652C9.64062 3.59668 9.96875 3.9248 10.3789 3.9248C10.7891 3.9248 11.1172 3.59668 11.1172 3.18652ZM13.1953 3.9248C13.1406 2.94043 12.9219 2.06543 12.2109 1.35449C11.5 0.643555 10.625 0.424805 9.64062 0.370117C8.62891 0.31543 5.59375 0.31543 4.58203 0.370117C3.59766 0.424805 2.75 0.643555 2.01172 1.35449C1.30078 2.06543 1.08203 2.94043 1.02734 3.9248C0.972656 4.93652 0.972656 7.97168 1.02734 8.9834C1.08203 9.96777 1.30078 10.8154 2.01172 11.5537C2.75 12.2646 3.59766 12.4834 4.58203 12.5381C5.59375 12.5928 8.62891 12.5928 9.64062 12.5381C10.625 12.4834 11.5 12.2646 12.2109 11.5537C12.9219 10.8154 13.1406 9.96777 13.1953 8.9834C13.25 7.97168 13.25 4.93652 13.1953 3.9248ZM11.8828 10.0498C11.6914 10.5967 11.2539 11.0068 10.7344 11.2256C9.91406 11.5537 8 11.4717 7.125 11.4717C6.22266 11.4717 4.30859 11.5537 3.51562 11.2256C2.96875 11.0068 2.55859 10.5967 2.33984 10.0498C2.01172 9.25684 2.09375 7.34277 2.09375 6.44043C2.09375 5.56543 2.01172 3.65137 2.33984 2.83105C2.55859 2.31152 2.96875 1.90137 3.51562 1.68262C4.30859 1.35449 6.22266 1.43652 7.125 1.43652C8 1.43652 9.91406 1.35449 10.7344 1.68262C11.2539 1.87402 11.6641 2.31152 11.8828 2.83105C12.2109 3.65137 12.1289 5.56543 12.1289 6.44043C12.1289 7.34277 12.2109 9.25684 11.8828 10.0498Z" />
    </symbol>
    <!-- <symbol id="icon_youtube" viewBox="0 0 16 11">
      <path
        d="M15.0117 1.8584C14.8477 1.20215 14.3281 0.682617 13.6992 0.518555C12.5234 0.19043 7.875 0.19043 7.875 0.19043C7.875 0.19043 3.19922 0.19043 2.02344 0.518555C1.39453 0.682617 0.875 1.20215 0.710938 1.8584C0.382812 3.00684 0.382812 5.46777 0.382812 5.46777C0.382812 5.46777 0.382812 7.90137 0.710938 9.07715C0.875 9.7334 1.39453 10.2256 2.02344 10.3896C3.19922 10.6904 7.875 10.6904 7.875 10.6904C7.875 10.6904 12.5234 10.6904 13.6992 10.3896C14.3281 10.2256 14.8477 9.7334 15.0117 9.07715C15.3398 7.90137 15.3398 5.46777 15.3398 5.46777C15.3398 5.46777 15.3398 3.00684 15.0117 1.8584ZM6.34375 7.68262V3.25293L10.2266 5.46777L6.34375 7.68262Z" />
    </symbol>
    <symbol id="icon_pinterest" viewBox="0 0 14 15">
      <path
        d="M13.5625 7.44043C13.5625 3.69434 10.5273 0.65918 6.78125 0.65918C3.03516 0.65918 0 3.69434 0 7.44043C0 10.3389 1.77734 12.7725 4.29297 13.7568C4.23828 13.2373 4.18359 12.417 4.32031 11.8154C4.45703 11.2959 5.11328 8.45215 5.11328 8.45215C5.11328 8.45215 4.92188 8.04199 4.92188 7.44043C4.92188 6.51074 5.46875 5.7998 6.15234 5.7998C6.72656 5.7998 7 6.2373 7 6.75684C7 7.33105 6.61719 8.20605 6.42578 9.02637C6.28906 9.68262 6.78125 10.2295 7.4375 10.2295C8.64062 10.2295 9.57031 8.97168 9.57031 7.13965C9.57031 5.49902 8.39453 4.37793 6.75391 4.37793C4.8125 4.37793 3.69141 5.82715 3.69141 7.30371C3.69141 7.90527 3.91016 8.53418 4.18359 8.8623C4.23828 8.91699 4.23828 8.99902 4.23828 9.05371C4.18359 9.27246 4.04688 9.7373 4.04688 9.81934C4.01953 9.95605 3.9375 9.9834 3.80078 9.92871C2.95312 9.51855 2.43359 8.28809 2.43359 7.27637C2.43359 5.14355 3.99219 3.1748 6.91797 3.1748C9.26953 3.1748 11.1016 4.87012 11.1016 7.1123C11.1016 9.43652 9.625 11.3232 7.57422 11.3232C6.89062 11.3232 6.23438 10.9678 6.01562 10.5303C6.01562 10.5303 5.6875 11.8428 5.60547 12.1436C5.44141 12.7451 5.03125 13.4834 4.75781 13.9209C5.38672 14.1396 6.07031 14.2217 6.78125 14.2217C10.5273 14.2217 13.5625 11.1865 13.5625 7.44043Z" />
    </symbol> -->
    <symbol id="icon_search" viewBox="0 0 20 20">
      <g clip-path="url(#clip0_6_7)">
        <path
          d="M8.80758 0C3.95121 0 0 3.95121 0 8.80758C0 13.6642 3.95121 17.6152 8.80758 17.6152C13.6642 17.6152 17.6152 13.6642 17.6152 8.80758C17.6152 3.95121 13.6642 0 8.80758 0ZM8.80758 15.9892C4.84769 15.9892 1.62602 12.7675 1.62602 8.80762C1.62602 4.84773 4.84769 1.62602 8.80758 1.62602C12.7675 1.62602 15.9891 4.84769 15.9891 8.80758C15.9891 12.7675 12.7675 15.9892 8.80758 15.9892Z"
          fill="currentColor" />
        <path
          d="M19.7618 18.6122L15.1006 13.9509C14.783 13.6333 14.2686 13.6333 13.951 13.9509C13.6334 14.2683 13.6334 14.7832 13.951 15.1005L18.6122 19.7618C18.771 19.9206 18.9789 20 19.187 20C19.3949 20 19.603 19.9206 19.7618 19.7618C20.0795 19.4444 20.0795 18.9295 19.7618 18.6122Z"
          fill="currentColor" />
      </g>
      <defs>
        <clipPath id="clip0_6_7">
          <rect width="20" height="20" fill="white" />
        </clipPath>
      </defs>
    </symbol>
    <symbol id="icon_user" viewBox="0 0 20 20">
      <g clip-path="url(#clip0_6_29)">
        <path
          d="M10 11.2652C3.99077 11.2652 0.681274 14.108 0.681274 19.2701C0.681274 19.6732 1.00803 20 1.4112 20H18.5888C18.992 20 19.3187 19.6732 19.3187 19.2701C19.3188 14.1083 16.0093 11.2652 10 11.2652ZM2.16768 18.5402C2.45479 14.6805 5.08616 12.7251 10 12.7251C14.9139 12.7251 17.5453 14.6805 17.8326 18.5402H2.16768Z"
          fill="currentColor" />
        <path
          d="M10 0C7.23969 0 5.1582 2.12336 5.1582 4.93895C5.1582 7.83699 7.33023 10.1944 10 10.1944C12.6698 10.1944 14.8419 7.83699 14.8419 4.93918C14.8419 2.12336 12.7604 0 10 0ZM10 8.7348C8.13508 8.7348 6.61805 7.03211 6.61805 4.93918C6.61805 2.92313 8.04043 1.45984 10 1.45984C11.9283 1.45984 13.382 2.95547 13.382 4.93918C13.382 7.03211 11.865 8.7348 10 8.7348Z"
          fill="currentColor" />
      </g>
      <defs>
        <clipPath id="clip0_6_29">
          <rect width="20" height="20" fill="white" />
        </clipPath>
      </defs>
    </symbol>
    <symbol id="icon_cart" viewBox="0 0 20 20">
      <path
        d="M17.6562 4.6875H15.2755C14.9652 2.05164 12.7179 0 10 0C7.28215 0 5.0348 2.05164 4.72445 4.6875H2.34375C1.91227 4.6875 1.5625 5.03727 1.5625 5.46875V19.2188C1.5625 19.6502 1.91227 20 2.34375 20H17.6562C18.0877 20 18.4375 19.6502 18.4375 19.2188V5.46875C18.4375 5.03727 18.0877 4.6875 17.6562 4.6875ZM10 1.5625C11.8548 1.5625 13.3992 2.91621 13.6976 4.6875H6.30238C6.60082 2.91621 8.14516 1.5625 10 1.5625ZM16.875 18.4375H3.125V6.25H4.6875V8.59375C4.6875 9.02523 5.03727 9.375 5.46875 9.375C5.90023 9.375 6.25 9.02523 6.25 8.59375V6.25H13.75V8.59375C13.75 9.02523 14.0998 9.375 14.5312 9.375C14.9627 9.375 15.3125 9.02523 15.3125 8.59375V6.25H16.875V18.4375Z"
        fill="currentColor" />
    </symbol>
    <symbol id="icon_heart" viewBox="0 0 20 20">
      <g clip-path="url(#clip0_6_54)">
        <path
          d="M18.3932 3.30806C16.218 1.13348 12.6795 1.13348 10.5049 3.30806L9.99983 3.81285L9.49504 3.30806C7.32046 1.13319 3.78163 1.13319 1.60706 3.30806C-0.523361 5.43848 -0.537195 8.81542 1.57498 11.1634C3.50142 13.3041 9.18304 17.929 9.4241 18.1248C9.58775 18.2578 9.78467 18.3226 9.9804 18.3226C9.98688 18.3226 9.99335 18.3226 9.99953 18.3223C10.202 18.3317 10.406 18.2622 10.575 18.1248C10.816 17.929 16.4982 13.3041 18.4253 11.1631C20.5371 8.81542 20.5233 5.43848 18.3932 3.30806ZM17.1125 9.98188C15.6105 11.6505 11.4818 15.0919 9.99953 16.3131C8.51724 15.0922 4.38944 11.6511 2.88773 9.98218C1.41427 8.34448 1.40044 6.01214 2.85564 4.55693C3.59885 3.81402 4.57488 3.44227 5.5509 3.44227C6.52693 3.44227 7.50295 3.81373 8.24616 4.55693L9.3564 5.66718C9.48856 5.79934 9.65516 5.87822 9.82999 5.90589C10.1137 5.96682 10.4216 5.88764 10.6424 5.66747L11.7532 4.55693C13.2399 3.07082 15.6582 3.07111 17.144 4.55693C18.5992 6.01214 18.5854 8.34448 17.1125 9.98188Z"
          fill="currentColor" />
      </g>
      <defs>
        <clipPath id="clip0_6_54">
          <rect width="20" height="20" fill="white" />
        </clipPath>
      </defs>
    </symbol>
    <symbol id="icon_star" viewBox="0 0 9 9">
      <path
        d="M4.0172 0.313075L2.91869 2.64013L0.460942 3.0145C0.0201949 3.08129 -0.15644 3.64899 0.163185 3.97415L1.94131 5.78447L1.52075 8.34177C1.44505 8.80402 1.91103 9.15026 2.30131 8.93408L4.5 7.72661L6.69869 8.93408C7.08897 9.14851 7.55495 8.80402 7.47925 8.34177L7.05869 5.78447L8.83682 3.97415C9.15644 3.64899 8.97981 3.08129 8.53906 3.0145L6.08131 2.64013L4.9828 0.313075C4.78598 -0.101718 4.2157 -0.10699 4.0172 0.313075Z" />
    </symbol>
    <symbol id="icon_next_sm" viewBox="0 0 7 11">
      <path
        d="M6.83968 5.89247C7.05344 5.67871 7.05344 5.32158 6.83968 5.10728L1.90756 0.162495C1.69106 -0.0540023 1.33996 -0.0540023 1.12401 0.162495C0.90751 0.378993 0.90751 0.730642 1.12401 0.94714L5.66434 5.50012L1.12346 10.0526C0.906962 10.2696 0.906962 10.6207 1.12346 10.8377C1.33996 11.0542 1.69106 11.0542 1.90701 10.8377L6.83968 5.89247Z"
        fill="currentColor" />
    </symbol>
    <symbol id="icon_prev_sm" viewBox="0 0 7 11">
      <path
        d="M0.160318 5.10778C-0.0534392 5.32153 -0.0534392 5.67866 0.160318 5.89297L5.09244 10.8377C5.30894 11.0542 5.66004 11.0542 5.87599 10.8377C6.09249 10.6213 6.09249 10.2696 5.87599 10.0531L1.33566 5.50012L5.87654 0.947687C6.09304 0.730642 6.09304 0.379541 5.87654 0.162495C5.66004 -0.0540027 5.30894 -0.0540027 5.09299 0.162495L0.160318 5.10778Z"
        fill="currentColor" />
    </symbol>
    <symbol id="icon_next_md" viewBox="0 0 25 25">
      <path
        d="M19.017 13.3923L7.77464 24.631C7.28133 25.123 6.48209 25.123 5.98753 24.631C5.49423 24.1389 5.49423 23.3397 5.98753 22.8476L16.3382 12.5007L5.98878 2.15376C5.49547 1.66169 5.49547 0.862455 5.98878 0.369148C6.48209 -0.122915 7.28257 -0.122915 7.77588 0.369148L19.0183 11.6078C19.5041 12.0948 19.5041 12.9066 19.017 13.3923Z"
        fill="currentColor" />
    </symbol>
    <symbol id="icon_prev_md" viewBox="0 0 25 25">
      <path
        d="M5.98293 11.6078L17.2253 0.369152C17.7186 -0.12291 18.5179 -0.12291 19.0124 0.369152C19.5057 0.861216 19.5057 1.66045 19.0124 2.15252L8.66176 12.4994L19.0112 22.8463C19.5045 23.3384 19.5045 24.1376 19.0112 24.631C18.5179 25.123 17.7174 25.123 17.2241 24.631L5.98168 13.3924C5.49595 12.9054 5.49595 12.0936 5.98293 11.6078Z"
        fill="currentColor" />
    </symbol>
    <symbol id="icon_close" viewBox="0 0 12 12">
      <path d="M0.311322 10.6261L10.9374 0L12 1.06261L1.37393 11.6887L0.311322 10.6261Z" fill="currentColor" />
      <path d="M1.06261 0.106781L11.6887 10.7329L10.6261 11.7955L0 1.16939L1.06261 0.106781Z" fill="currentColor" />
    </symbol>
  </svg>
  
  <style>
    /* Enhanced Modern Styling */
    :root {
      --primary-color: #b8941f;
      --secondary-color: #f8f9fa;
      --accent-color: #e91e63;
      --text-dark:rgb(44, 62, 80);
      --text-light: #6c757d;
      --border-color: #e9ecef;
      --shadow-light: 0 2px 10px rgba(0,0,0,0.1);
      --shadow-medium: 0 4px 20px rgba(0,0,0,0.15);
      --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --gradient-accent: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    body {
      font-family: 'Jost', sans-serif;
      line-height: 1.6;
      color: var(--text-dark);
    }

    /* Header Enhancements */
    #header {
      padding: 6px 0;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      box-shadow: var(--shadow-light);
      transition: all 0.3s ease;
    }

    .header-desk_type_1 {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .logo__image {
      max-width: 150px;
      height: auto;
      transition: transform 0.3s ease;
    }

    .logo:hover .logo__image {
      transform: scale(1.05);
    }

    /* Navigation Enhancements */
    .navigation__list {
      display: flex;
      gap: 2rem;
      margin: 0;
      padding: 0;
    }

    .navigation__link {
      position: relative;
      font-weight: 500;
      color: var(--text-dark);
      text-decoration: none;
      padding: 0.5rem 0;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      font-size: 0.9rem;
    }

    .navigation__link::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 2px;
      background: var(--gradient-primary);
      transition: width 0.3s ease;
    }

    .navigation__link:hover::after {
      width: 100%;
    }

    .navigation__link:hover {
      color: var(--primary-color);
      transform: translateY(-2px);
    }

    /* Header Tools Enhancements */
    .header-tools {
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }

    .header-tools__item {
      position: relative;
      padding: 0.5rem;
      border-radius: 50%;
      transition: all 0.3s ease;
      color: var(--text-dark);
    }

    .header-tools__item:hover {
      background: var(--secondary-color);
      transform: translateY(-2px);
      box-shadow: var(--shadow-light);
    }

    .cart-amount {
      background: var(--gradient-accent);
      color: white;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      font-size: 0.75rem;
      font-weight: 600;
      display: flex;
      align-items: center;
      justify-content: center;
      top: -5px;
      right: -5px;
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.1); }
      100% { transform: scale(1); }
    }

    /* Search Popup Enhancements */
    .search-popup {
      position: absolute;
      top: 100%;
      right: 0;
      width: 400px;
      background: white;
      border-radius: 15px;
      box-shadow: var(--shadow-medium);
      padding: 2rem;
      z-index: 1000;
      transform: translateY(-10px);
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }

    .search-popup.active {
      transform: translateY(0);
      opacity: 1;
      visibility: visible;
    }

    .search-field__input {
      border: 2px solid var(--border-color);
      border-radius: 25px;
      padding: 1rem 1.5rem;
      font-size: 1rem;
      transition: all 0.3s ease;
      background: var(--secondary-color);
    }

    .search-field__input:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
      outline: none;
      background: white;
    }

    /* Product Item Enhancements */
    .product-item {
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 1rem;
      border-radius: 10px;
      transition: all 0.3s ease;
      margin-bottom: 0.5rem;
    }

    .product-item:hover {
      background: var(--secondary-color);
      transform: translateX(5px);
    }

    .product-item .image {
      width: 60px;
      height: 60px;
      border-radius: 10px;
      overflow: hidden;
      background: white;
      box-shadow: var(--shadow-light);
      flex-shrink: 0;
    }

    .product-item .image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .product-item .name a {
      color: var(--text-dark);
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .product-item .name a:hover {
      color: var(--primary-color);
    }

    /* Mobile Header Enhancements */
    .header-mobile {
      background: white;
      box-shadow: var(--shadow-light);
      padding: 1rem 0;
    }

    .mobile-nav-activator {
      padding: 0.5rem;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .mobile-nav-activator:hover {
      background: var(--secondary-color);
    }

    /* Footer Enhancements */
    .footer {
      background: var(--text-dark);
      color: white;
      padding: 3rem 0 1rem;
      margin-top: 4rem;
    }

    .footer-middle {
      padding-bottom: 2rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .footer-column h6 {
      color: var(--primary-color);
      font-weight: 600;
      margin-bottom: 1.5rem;
      font-size: 1.1rem;
    }

    .footer-column .menu-link {
      color: rgba(255, 255, 255, 0.8);
      text-decoration: none;
      transition: all 0.3s ease;
      display: block;
      padding: 0.25rem 0;
    }

    .footer-column .menu-link:hover {
      color: var(--primary-color);
      transform: translateX(5px);
    }

    .social-links {
      display: flex;
      gap: 1rem;
      margin-top: 1.5rem;
    }

    .footer__social-link {
      width: 40px;
      height: 40px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }

    .footer__social-link:hover {
      background: var(--primary-color);
      transform: translateY(-3px);
    }

    .footer-bottom {
      padding: 1.5rem 0;
      text-align: center;
      color: rgba(255, 255, 255, 0.6);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .navigation__list {
        flex-direction: column;
        gap: 1rem;
      }
      
      .header-tools {
        gap: 1rem;
      }
      
      .search-popup {
        width: 300px;
        right: -50px;
      }
      
      .logo__image {
        max-width: 150px;
      }
    }

    /* Animation Classes */
    .animate-fade-in {
      animation: fadeIn 0.6s ease-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-slide-up {
      animation: slideUp 0.6s ease-out;
    }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Enhanced Hover Effects */
    .hover-lift {
      transition: all 0.3s ease;
    }

    .hover-lift:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-medium);
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-track {
      background: var(--secondary-color);
    }

    ::-webkit-scrollbar-thumb {
      background: var(--primary-color);
      border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #b8941f;
    }
  </style>

  <!-- Mobile Header -->
  <div class="header-mobile header_sticky d-lg-none">
    <div class="container d-flex align-items-center h-100">
      <a class="mobile-nav-activator d-block position-relative" href="#">
        <svg class="nav-icon" width="25" height="18" viewBox="0 0 25 18" xmlns="http://www.w3.org/2000/svg">
          <use href="#icon_nav" />
        </svg>
        <button class="btn-close-lg position-absolute top-0 start-0 w-100"></button>
      </a>

      <div class="logo mx-auto">
        <a href="<?php echo e(route('home.index')); ?>">
          <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="Fashion Store" class="logo__image d-block" />
        </a>
      </div>

      <div class="d-flex align-items-center gap-3">
        <a href="<?php echo e(route('wishlist.index')); ?>" class="header-tools__item">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_heart" />
          </svg>
          <?php if(Cart::instance("wishlist")->content()->count()>0): ?> 
            <span class="cart-amount d-block position-absolute"><?php echo e(Cart::instance("wishlist")->content()->count()); ?></span>
          <?php endif; ?>     
        </a>

        <a href="<?php echo e(route('cart.index')); ?>" class="header-tools__item">
          <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_cart" />
          </svg>
          <?php if(Cart::instance('cart')->content()->count()>0): ?>
            <span class="cart-amount d-block position-absolute"><?php echo e(Cart::instance('cart')->content()->count()); ?></span>
          <?php endif; ?>
        </a>
      </div>
    </div>

    <!-- Mobile Navigation -->
    <nav class="header-mobile__navigation navigation d-flex flex-column w-100 position-absolute top-100 bg-body overflow-auto">
      <div class="container">
        <form action="#" method="GET" class="search-field position-relative mt-4 mb-3">
          <div class="position-relative">
            <input class="search-field__input w-100 border rounded-pill" type="text" name="search-keyword"
              placeholder="Search products" />
            <button class="btn-icon search-popup__submit pb-0 me-2" type="submit">
              <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_search" />
              </svg>
            </button>
          </div>
          <div class="position-absolute start-0 top-100 m-0 w-100">
            <div class="search-result"></div>
          </div>
        </form>
      </div>

      <div class="container">
        <div class="overflow-hidden">
          <ul class="navigation__list list-unstyled position-relative">
            <li class="navigation__item">
              <a href="<?php echo e(route('home.index')); ?>" class="navigation__link">Home</a>
            </li>
            <li class="navigation__item">
              <a href="<?php echo e(route('shop.index')); ?>" class="navigation__link">Shop</a>
            </li>
            <li class="navigation__item">
              <a href="<?php echo e(route('recommendation.index')); ?>" class="navigation__link">Recommendation</a>
            </li>
            <li class="navigation__item">
              <a href="<?php echo e(route('cart.index')); ?>" class="navigation__link">Cart</a>
            </li>
            <li class="navigation__item">
              <a href="<?php echo e(route('home.about')); ?>" class="navigation__link">About</a>
            </li>
            <li class="navigation__item">
              <a href="<?php echo e(route('home.contact')); ?>" class="navigation__link">Contact</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="border-top mt-auto pb-2">
        <div class="customer-links container mt-4 mb-2 pb-1">
          <?php if(auth()->guard()->guest()): ?>
            <a href="<?php echo e(route('login')); ?>" class="d-flex align-items-center text-decoration-none">
              <svg class="d-inline-block align-middle" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_user" />
              </svg>
              <span class="d-inline-block ms-2 text-uppercase align-middle fw-medium">Login</span>
            </a>
          <?php else: ?>
            <a href="<?php echo e(Auth::user()->utype === 'ADM' ? route('admin.index'): route('user.index')); ?>" class="d-flex align-items-center text-decoration-none">
              <svg class="d-inline-block align-middle" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_user" />
              </svg>
              <span class="d-inline-block ms-2 text-uppercase align-middle fw-medium"><?php echo e(Auth::user()->name); ?></span>
            </a>
          <?php endif; ?>
        </div>

        <ul class="container social-links list-unstyled d-flex flex-wrap mb-0">
          <li>
            <a href="#" class="footer__social-link d-block ps-0">
              <svg class="svg-icon svg-icon_facebook" width="9" height="15" viewBox="0 0 9 15" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_facebook" />
              </svg>
            </a>
          </li>
          <li>
            <a href="#" class="footer__social-link d-block">
              <svg class="svg-icon svg-icon_twitter" width="14" height="13" viewBox="0 0 14 13" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_twitter" />
              </svg>
            </a>
          </li>
          
          <li>
            <a href="#" class="footer__social-link d-block">
              <svg class="svg-icon svg-icon_instagram " width="9" height="13" viewBox="0 0 14 13" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_instagram" />
              </svg>
            </a>
          </li>
          <!-- <li>
            <a href="#" class="footer__social-link d-block ps-0">
              <svg class="svg-icon svg-icon_instagram" width="9" height="15" viewBox="0 0 9 15" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_instagram" />
              </svg>
            </a>
          </li> -->
          <!-- <li>
            <a href="#" class="footer__social-link d-block">
              <svg class="svg-icon svg-icon_youtube" width="16" height="11" viewBox="0 0 16 11" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_youtube" />
              </svg>
            </a>
          </li> -->
          <!-- <li>
            <a href="#" class="footer__social-link d-block">
              <svg class="svg-icon svg-icon_pinterest" width="14" height="15" viewBox="0 0 14 15" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_pinterest" />
              </svg>
            </a>
          </li> -->
        </ul>
      </div>
    </nav>
  </div>

  <!-- Desktop Header -->
  <header id="header" class="header header-fullwidth header-transparent-bg d-none d-lg-block">
    <div class="container">
      <div class="header-desk header-desk_type_1">
        <div class="logo">
          <a href="<?php echo e(route('home.index')); ?>">
            <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="Fashion Store" class="logo__image d-block" />
          </a>
        </div>

        <nav class="navigation">
          <ul class="navigation__list list-unstyled d-flex">
            <li class="navigation__item">
              <a href="<?php echo e(route('home.index')); ?>" class="navigation__link">Home</a>
            </li>
            <li class="navigation__item">
              <a href="<?php echo e(route('shop.index')); ?>" class="navigation__link">Shop</a>
            </li>
            <li class="navigation__item">
              <a href="<?php echo e(route('recommendation.index')); ?>" class="navigation__link">Recommendation</a>
            </li>
            <li class="navigation__item">
              <a href="<?php echo e(route('cart.index')); ?>" class="navigation__link">Cart</a>
            </li>
            <li class="navigation__item">
              <a href="<?php echo e(route('home.about')); ?>" class="navigation__link">About</a>
            </li>
            <li class="navigation__item">
              <a href="<?php echo e(route('home.contact')); ?>" class="navigation__link">Contact</a>
            </li>
          </ul>
        </nav>

        <div class="header-tools d-flex align-items-center">
          <div class="header-tools__item hover-container">
            <div class="js-hover__open position-relative">
              <a class="js-search-popup search-field__actor" href="#">
                <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_search" />
                </svg>
                <i class="btn-icon btn-close-lg"></i>
              </a>
            </div>

            <div class="search-popup js-hidden-content">
              <form action="#" method="GET" class="search-field">
                <p class="text-uppercase text-secondary fw-medium mb-4">What are you looking for?</p>
                <div class="position-relative">
                  <input class="search-field__input search-popup__input w-100 fw-medium" type="text" name="search-keyword" id="search-input" placeholder="Search products" />
                  <button class="btn-icon search-popup__submit position-absolute end-0 top-50 translate-middle-y me-3" type="submit">
                    <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_search" />
                    </svg>
                  </button>
                </div>

                <div class="search-popup__results mt-3">
                  <ul id="box-content-search" class="list-unstyled">
                  </ul>
                </div>
              </form>
            </div>
          </div>

          <?php if(auth()->guard()->guest()): ?>
          <div class="header-tools__item hover-container">
            <a href="<?php echo e(route('login')); ?>" class="header-tools__item d-flex align-items-center gap-2">
              <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_user" />
              </svg>
              <span class="d-none d-xl-inline">Login</span>
            </a>
          </div>
          <?php else: ?>
          <div class="header-tools__item hover-container">
            <a href="<?php echo e(Auth::user()->utype === 'ADM' ? route('admin.index'): route('user.index')); ?>" class="header-tools__item d-flex align-items-center gap-2">
              <span class="d-none d-xl-inline fw-medium"><?php echo e(Auth::user()->name); ?></span>
              <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_user" />
              </svg>
            </a>
          </div>
          <?php endif; ?>

          <a href="<?php echo e(route('wishlist.index')); ?>" class="header-tools__item header-tools__cart position-relative">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_heart" />
            </svg>
            <?php if(Cart::instance("wishlist")->content()->count()>0): ?> 
              <span class="cart-amount d-block position-absolute"><?php echo e(Cart::instance("wishlist")->content()->count()); ?></span>
            <?php endif; ?>     
          </a>

          <a href="<?php echo e(route('cart.index')); ?>" class="header-tools__item header-tools__cart position-relative">
            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_cart" />
            </svg>
            <?php if(Cart::instance('cart')->content()->count()>0): ?>
              <span class="cart-amount d-block position-absolute"><?php echo e(Cart::instance('cart')->content()->count()); ?></span>
            <?php endif; ?>
          </a>
        </div>
      </div>
    </div>
  </header>

  <?php echo $__env->yieldContent("content"); ?>

  <!-- Enhanced Footer -->
  <hr class="mt-5 text-secondary" />
  <footer class="footer footer_type_2">
    <div class="footer-middle container">
      <div class="row row-cols-lg-5 row-cols-2">
        <div class="footer-column footer-store-info col-12 col-lg-3 mb-4 mb-lg-0">
          <div class="logo" style="
  background-color: rgba(255, 255, 255, 0.46);
  border-radius: 50%;
  padding: 10px;
  display: inline-block;
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.24);
">
  <a href="<?php echo e(route('home.index')); ?>">
    <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="Fashion Store" class="logo__image d-block" style="max-width: 140px;" />
  </a>
</div>

          <p class="footer-address mb-2">Helping you discover outfits that match your skin tone, age, and personal style. Get tailored fashion advice, explore trendy collections, and feel confident in what you wear.</p>
          

          <ul class="social-links list-unstyled d-flex flex-wrap mb-0">
            <li>
              <a href="#" class="footer__social-link d-block">
                <svg class="svg-icon svg-icon_facebook" width="9" height="15" viewBox="0 0 9 15" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_facebook" />
                </svg>
              </a>
            </li>
            <li>
              <a href="#" class="footer__social-link d-block">
                <svg class="svg-icon svg-icon_twitter" width="14" height="13" viewBox="0 0 14 13" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_twitter" />
                </svg>
              </a>
            </li>
            <li>
              <a href="#" class="footer__social-link d-block">
                <svg class="svg-icon svg-icon_instagram" width="14" height="13" viewBox="0 0 14 13" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_instagram" />
                </svg>
              </a>
            </li>
            <!-- <li>
              <a href="#" class="footer__social-link d-block">
                <svg class="svg-icon svg-icon_youtube" width="16" height="11" viewBox="0 0 16 11" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_youtube" />
                </svg>
              </a>
            </li> -->
            <!-- <li>
              <a href="#" class="footer__social-link d-block">
                <svg class="svg-icon svg-icon_pinterest" width="14" height="15" viewBox="0 0 14 15" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_pinterest" />
                </svg>
              </a>
            </li> -->
          </ul>
        </div>

        <!-- <div class="footer-column footer-menu mb-4 mb-lg-0">
          <h6 class="sub-menu__title text-uppercase">Company</h6>
          <ul class="sub-menu__list list-unstyled">
            <li class="sub-menu__item"><a href="<?php echo e(route('home.about')); ?>" class="menu-link menu-link_us-s">About Us</a></li>
            <li class="sub-menu__item"><a href="#" class="menu-link menu-link_us-s">Careers</a></li>
            <li class="sub-menu__item"><a href="#" class="menu-link menu-link_us-s">Affiliates</a></li>
            <li class="sub-menu__item"><a href="#" class="menu-link menu-link_us-s">Blog</a></li>
            <li class="sub-menu__item"><a href="<?php echo e(route('home.contact')); ?>" class="menu-link menu-link_us-s">Contact Us</a></li>
          </ul>
        </div> -->

        <div class="footer-column footer-menu mb-4 mb-lg-0">
          <h6 class="sub-menu__title text-uppercase text-white">Shop</h6>
          <ul class="sub-menu__list list-unstyled">
            <li class="sub-menu__item"><a href="<?php echo e(route('shop.index')); ?>" class="menu-link menu-link_us-s">New Arrivals</a></li>
            <!-- <li class="sub-menu__item"><a href="<?php echo e(route('shop.index')); ?>" class="menu-link menu-link_us-s">Accessories</a></li> -->
            <!-- <li class="sub-menu__item"><a href="<?php echo e(route('shop.index')); ?>" class="menu-link menu-link_us-s">Dresses</a></li> -->
            <!-- <li class="sub-menu__item"><a href="<?php echo e(route('shop.index')); ?>" class="menu-link menu-link_us-s">Tops</a></li> -->
            <li class="sub-menu__item"><a href="<?php echo e(route('shop.index')); ?>" class="menu-link menu-link_us-s">Shop All</a></li>
          </ul>
        </div>

        <div class="footer-column footer-menu mb-4 mb-lg-0">
          <h6 class="sub-menu__title text-uppercase text-white">Categories</h6>
          <ul class="sub-menu__list list-unstyled">
            <li class="sub-menu__item"><a href="<?php echo e(route('shop.index')); ?>" class="menu-link menu-link_us-s">Casual</a></li>
            <li class="sub-menu__item"><a href="<?php echo e(route('shop.index')); ?>" class="menu-link menu-link_us-s">Partywear</a></li>
            <li class="sub-menu__item"><a href="<?php echo e(route('shop.index')); ?>" class="menu-link menu-link_us-s">Formal</a></li>
            <!-- <li class="sub-menu__item"><a href="<?php echo e(route('shop.index')); ?>" class="menu-link menu-link_us-s">Winter</a></li> -->
            <!-- <li class="sub-menu__item"><a href="<?php echo e(route('shop.index')); ?>" class="menu-link menu-link_us-s">Shop All</a></li> -->
          </ul>
        </div>

        <div class="footer-column footer-menu mb-4 mb-lg-0">
          <h6 class="sub-menu__title text-uppercase text-white">Help</h6>
          <ul class="sub-menu__list list-unstyled">
            <li class="sub-menu__item"><a href="#" class="menu-link menu-link_us-s">Customer Service</a></li>
            <!-- <li class="sub-menu__item"><a href="<?php echo e(Auth::check() ? (Auth::user()->utype === 'ADM' ? route('admin.index'): route('user.index')) : route('login')); ?>" class="menu-link menu-link_us-s">My Account</a></li> -->
            <li class="sub-menu__item"><a href="#" class="menu-link menu-link_us-s">Contact Us</a></li>
            <!-- <li class="sub-menu__item"><a href="#" class="menu-link menu-link_us-s">Legal & Privacy</a></li>
            <li class="sub-menu__item"><a href="#" class="menu-link menu-link_us-s">Gift Card</a></li> -->
          </ul>
        </div>

        <!-- <div class="footer-column footer-menu mb-4 mb-lg-0">
          <h6 class="sub-menu__title text-uppercase">Categories</h6>
          <ul class="sub-menu__list list-unstyled">
            <li class="sub-menu__item"><a href="<?php echo e(route('shop.index')); ?>" class="menu-link menu-link_us-s">Casuals</a></li>
            <li class="sub-menu__item"><a href="<?php echo e(route('shop.index')); ?>" class="menu-link menu-link_us-s">Partywear</a></li>
            <li class="sub-menu__item"><a href="<?php echo e(route('shop.index')); ?>" class="menu-link menu-link_us-s">Summer</a></li>
            <li class="sub-menu__item"><a href="<?php echo e(route('shop.index')); ?>" class="menu-link menu-link_us-s">Winter</a></li>
            <li class="sub-menu__item"><a href="<?php echo e(route('shop.index')); ?>" class="menu-link menu-link_us-s">Shop All</a></li>
          </ul>
        </div> -->
       <div class="footer-column footer-menu mb-4 mb-lg-0">
  <h6 class="sub-menu__title text-uppercase text-white">Contact Info</h6>
  <ul class="sub-menu__list list-unstyled text-white">
    <!-- <li class="mb-2 d-flex align-items-start">
      <i class="bi bi-geo-alt-fill me-2 text-white"></i>
      <span>123 Fashion Avenue, Style City, CA 00000</span>
    </li> -->
    <li class="mb-2 d-flex align-items-start">
      <i class="bi bi-envelope-fill me-2 text-white"></i>
      <strong class="fw-medium text-white">support@dressyapp.com</strong>
    </li>
    <li class="d-flex align-items-start">
      <i class="bi bi-telephone-fill me-2 text-white"></i>
      <strong class="fw-medium text-white">+92 300 1234567</strong>
    </li>
  </ul>
</div>


      </div>
    </div>

    <!-- ✅ Footer Bottom Centered -->
<div class="footer-bottom">
  <div class="container text-center py-3">
    <span class="footer-copyright">
      ©2025 Dressy. All rights reserved.
    </span>
  </div>
</div>

  </footer>

  <!-- Mobile Footer -->
  <footer class="footer-mobile container w-100 px-5 d-md-none bg-body">
    <div class="row text-center">
      <div class="col-4">
        <a href="<?php echo e(route('home.index')); ?>" class="footer-mobile__link d-flex flex-column align-items-center">
          <svg class="d-block" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_home" />
          </svg>
          <span>Home</span>
        </a>
      </div>

      <div class="col-4">
        <a href="<?php echo e(route('shop.index')); ?>" class="footer-mobile__link d-flex flex-column align-items-center">
          <svg class="d-block" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_hanger" />
          </svg>
          <span>Shop</span>
        </a>
      </div>

      <div class="col-4">
        <a href="<?php echo e(route('wishlist.index')); ?>" class="footer-mobile__link d-flex flex-column align-items-center">
          <div class="position-relative">
            <svg class="d-block" width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_heart" />
            </svg>
            <?php if(Cart::instance("wishlist")->content()->count()>0): ?>
              <span class="wishlist-amount d-block position-absolute js-wishlist-count"><?php echo e(Cart::instance("wishlist")->content()->count()); ?></span>
            <?php endif; ?>
          </div>
          <span>Wishlist</span>
        </a>
      </div>
    </div>
  </footer>

  <div id="scrollTop" class="visually-hidden end-0"></div>
  <div class="page-overlay"></div>

  <!-- Scripts -->
  <script src="<?php echo e(asset('assets/js/plugins/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/plugins/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/plugins/bootstrap-slider.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/plugins/swiper.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/plugins/countdown.js')); ?>"></script>
  <script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>  
  
  <script>
  $(function(){
     // Enhanced search functionality
     $("#search-input").on("keyup",function(){
        var searchQuery = $(this).val();
        if(searchQuery.length > 2)
        {
          $.ajax({
            type: "GET",
            url: "<?php echo e(route('home.search')); ?>",
            data: {query: searchQuery},
            dataType: 'json',
            success: function(data){
              $("#box-content-search").html('');
              if(data.length > 0) {
                $.each(data,function(index,item){
                  var url = "<?php echo e(route('shop.product.details',['product_slug'=>'product_slug_pls'])); ?>";
                  var link = url.replace('product_slug_pls',item.slug);

                  $("#box-content-search").append(`
                    <li class="product-item animate-fade-in"> 
                      <div class="image">
                        <img src="<?php echo e(asset('uploads/products/thumbnails')); ?>/${item.image}" alt="${item.name}"> 
                      </div> 
                      <div class="flex-grow-1">
                        <div class="name">
                          <a href="${link}" class="body-text">${item.name}</a>
                        </div> 
                      </div> 
                    </li>       
                  `);
                });
              } else {
                $("#box-content-search").append(`
                  <li class="text-center py-3 text-muted">
                    <p>No products found</p>
                  </li>
                `);
              }
            }
          });
        } else {
          $("#box-content-search").html('');
        }
     });

     // Enhanced header scroll effect
     $(window).scroll(function() {
       if ($(this).scrollTop() > 100) {
         $('#header').addClass('scrolled');
       } else {
         $('#header').removeClass('scrolled');
       }
     });

     // Search popup toggle
     $('.js-search-popup').click(function(e) {
       e.preventDefault();
       $('.search-popup').toggleClass('active');
     });

     // Close search popup when clicking outside
     $(document).click(function(e) {
       if (!$(e.target).closest('.search-popup, .js-search-popup').length) {
         $('.search-popup').removeClass('active');
       }
     });

     // Mobile navigation toggle
     $('.mobile-nav-activator').click(function(e) {
       e.preventDefault();
       $('.header-mobile__navigation').toggleClass('active');
     });

     // Add loading animation to buttons
     $('button[type="submit"], .btn').click(function() {
       $(this).addClass('loading');
       setTimeout(() => {
         $(this).removeClass('loading');
       }, 2000);
     });

     // Smooth scroll for anchor links
     $('a[href^="#"]').click(function(e) {
       e.preventDefault();
       var target = $($(this).attr('href'));
       if (target.length) {
         $('html, body').animate({
           scrollTop: target.offset().top - 100
         }, 800);
       }
     });
  });
  </script>
  
  <script src="<?php echo e(asset('assets/js/theme.js')); ?>"></script>
  <?php echo $__env->yieldPushContent("scripts"); ?>
</body>
</html><?php /**PATH C:\Users\PMLS\Documents\Final-Year-Project\laravelfyp\resources\views/layouts/app.blade.php ENDPATH**/ ?>