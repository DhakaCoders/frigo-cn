<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
<head> 
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php $favicon = get_theme_mod('favicon'); if(!empty($favicon)) { ?> 
  <link rel="shortcut icon" href="<?php echo $favicon; ?>" />
  <?php } ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<svg style="display: none;">
  <symbol id="hdr-tp-sign-up-icon-svg" width="16" height="18" viewBox="0 0 16 18" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.5793 18H13.7554C13.7554 14.9231 11.1746 12.4207 8.00015 12.4207C4.82566 12.4207 2.24577 14.924 2.24577 18H0.421875C0.421875 13.9163 3.82252 10.5968 8.00106 10.5968C12.1787 10.5968 15.5793 13.9163 15.5793 18Z"/>
  <path d="M8.00111 10.0041C5.2443 10.0041 3 7.75884 3 5.00203C2.99909 2.2443 5.24339 0 8.00111 0C10.7598 0 13.0041 2.24339 13.0041 5.00203C13.0041 7.76066 10.7598 10.0041 8.00111 10.0041ZM8.00111 1.82389C6.24835 1.82389 4.82298 3.24927 4.82298 5.00203C4.82298 6.75479 6.24835 8.18016 8.00111 8.18016C9.75479 8.18016 11.1802 6.75479 11.1802 5.00203C11.1802 3.24927 9.75296 1.82389 8.00111 1.82389Z"/>
  </symbol>
  <symbol id="hdr-tp-cart-icon-svg" width="18" height="17" viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.941177C0 0.421384 0.402948 0 0.900001 0H2.7C3.1191 0 3.48272 0.302503 3.57695 0.729543L6.11596 12.2353H13.6973L15.9473 2.82353H9.00001C8.50294 2.82353 8.10001 2.40215 8.10001 1.88235C8.10001 1.36256 8.50294 0.941177 9.00001 0.941177H17.1C17.3771 0.941177 17.6388 1.0747 17.8094 1.30314C17.9799 1.53158 18.0403 1.82945 17.9731 2.11063L15.2731 13.4047C15.173 13.8237 14.813 14.1176 14.4 14.1176H5.40001C4.98088 14.1176 4.61728 13.8152 4.52305 13.3881L1.98404 1.88235H0.900001C0.402948 1.88235 0 1.46097 0 0.941177ZM7.20001 1.88235C7.20001 2.40215 6.79708 2.82353 6.30001 2.82353C5.80294 2.82353 5.40001 2.40215 5.40001 1.88235C5.40001 1.36256 5.80294 0.941177 6.30001 0.941177C6.79708 0.941177 7.20001 1.36256 7.20001 1.88235ZM7.20001 16C7.20001 16.5198 6.79708 16.9412 6.30001 16.9412C5.80294 16.9412 5.40001 16.5198 5.40001 16C5.40001 15.4802 5.80294 15.0588 6.30001 15.0588C6.79708 15.0588 7.20001 15.4802 7.20001 16ZM14.4 16C14.4 16.5198 13.9971 16.9412 13.5 16.9412C13.0029 16.9412 12.6 16.5198 12.6 16C12.6 15.4802 13.0029 15.0588 13.5 15.0588C13.9971 15.0588 14.4 15.4802 14.4 16Z"/>
  </symbol>
  <symbol id="hdr-btm-star-icon-svg" width="28" height="27" viewBox="0 0 28 27" xmlns="http://www.w3.org/2000/svg">
  <path d="M22.0352 26.7272C21.8238 26.7274 21.618 26.6604 21.4472 26.5358L14.0003 21.1265L6.5533 26.5358C6.38251 26.6599 6.17685 26.7267 5.96576 26.7267C5.75468 26.7267 5.549 26.66 5.37818 26.536C5.20736 26.412 5.08016 26.2371 5.01479 26.0364C4.94942 25.8357 4.94924 25.6194 5.01427 25.4186L7.85903 16.6645L7.46013 16.3745C7.35012 16.2988 7.25639 16.2019 7.18445 16.0894C7.11251 15.9769 7.06382 15.8512 7.04126 15.7196C7.0187 15.588 7.02272 15.4532 7.05309 15.3232C7.08346 15.1932 7.13955 15.0705 7.21806 14.9625C7.29658 14.8545 7.39593 14.7634 7.51024 14.6944C7.62456 14.6254 7.75154 14.58 7.88368 14.5609C8.01582 14.5418 8.15046 14.5493 8.27964 14.583C8.40882 14.6168 8.52994 14.6761 8.63585 14.7574L9.62278 15.4732C9.79354 15.5974 9.92064 15.7724 9.98588 15.9733C10.0511 16.1741 10.0512 16.3904 9.98598 16.5913L7.86783 23.109L13.4124 19.0816C13.583 18.9569 13.7889 18.8896 14.0003 18.8896C14.2116 18.8896 14.4175 18.9569 14.5882 19.0816L20.1327 23.109L18.0146 16.5912C17.9493 16.3905 17.9493 16.1743 18.0146 15.9736C18.0798 15.7729 18.207 15.598 18.3778 15.4741L23.9229 11.4447H17.0691C16.8579 11.4447 16.6521 11.3777 16.4812 11.2535C16.3103 11.1293 16.1832 10.9541 16.118 10.7532L14.0003 4.23642L11.8825 10.7536C11.8174 10.9545 11.6902 11.1297 11.5194 11.2539C11.3485 11.3781 11.1427 11.4451 10.9314 11.4451H4.07715L5.86919 12.7478C5.97981 12.8232 6.07416 12.9201 6.14665 13.0326C6.21913 13.1452 6.26828 13.2712 6.29117 13.4031C6.31407 13.535 6.31024 13.6702 6.27992 13.8006C6.2496 13.931 6.19341 14.0539 6.11467 14.1622C6.03593 14.2705 5.93626 14.3619 5.82155 14.4309C5.70684 14.4999 5.57944 14.5452 5.44689 14.5641C5.31435 14.583 5.17937 14.5751 5.04995 14.5408C4.92052 14.5065 4.7993 14.4466 4.69346 14.3647L0.412063 11.2536C0.241253 11.1294 0.114127 10.9544 0.048902 10.7536C-0.0163234 10.5527 -0.0163001 10.3364 0.0489683 10.1356C0.114237 9.93474 0.2414 9.75974 0.412236 9.63562C0.583073 9.5115 0.788814 9.44465 0.999977 9.44464H10.2048L13.0491 0.691441C13.1142 0.490487 13.2414 0.315341 13.4123 0.191124C13.5832 0.0669065 13.789 0 14.0003 0C14.2115 0 14.4174 0.0669065 14.5883 0.191124C14.7591 0.315341 14.8863 0.490487 14.9515 0.691441L17.7958 9.44464H27.0006C27.2116 9.44477 27.4172 9.51167 27.588 9.63576C27.7587 9.75986 27.8858 9.93479 27.951 10.1355C28.0163 10.3362 28.0163 10.5524 27.9512 10.7532C27.8861 10.954 27.7591 11.129 27.5885 11.2532L20.1415 16.6645L22.9863 25.4186C23.035 25.5687 23.0475 25.7281 23.0227 25.884C22.998 26.0398 22.9368 26.1875 22.844 26.3152C22.7512 26.4428 22.6296 26.5466 22.489 26.6183C22.3485 26.6899 22.1929 26.7272 22.0352 26.7272Z"/>
  </symbol>
  <symbol id="ftr-facebook-icon-svg" width="25" height="24" viewBox="0 0 25 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M12.1212 0C5.4376 0 0 5.38323 0 12C0 18.6163 5.4376 24 12.1212 24C18.8043 24 24.2424 18.6163 24.2424 12C24.2424 5.38323 18.8053 0 12.1212 0ZM15.1356 12.4225H13.1636V19.381H10.2415C10.2415 19.381 10.2415 15.5788 10.2415 12.4225H8.8524V9.9631H10.2415V8.37235C10.2415 7.23306 10.7883 5.45283 13.1905 5.45283L15.3558 5.46105V7.84838C15.3558 7.84838 14.04 7.84838 13.7842 7.84838C13.5283 7.84838 13.1646 7.97503 13.1646 8.51833V9.96359H15.391L15.1356 12.4225Z"/>
  </symbol>
  <symbol id="ftr-twiter-icon-svg" width="25" height="24" viewBox="0 0 25 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M12.4072 0C5.79045 0 0.407227 5.38323 0.407227 12C0.407227 18.6163 5.79045 24 12.4072 24C19.0235 24 24.4072 18.6163 24.4072 12C24.4072 5.38323 19.0245 0 12.4072 0ZM17.7605 9.25352C17.7658 9.37243 17.7687 9.49231 17.7687 9.61218C17.7687 13.2621 14.9913 17.4693 9.90968 17.4693C8.34987 17.4693 6.89784 17.0135 5.6759 16.2294C5.89196 16.2551 6.11189 16.2681 6.33472 16.2681C7.62917 16.2681 8.8197 15.8263 9.76516 15.0858C8.55675 15.0636 7.53637 14.265 7.18496 13.1673C7.35317 13.1992 7.5267 13.2171 7.70409 13.2171C7.95593 13.2171 8.20051 13.1842 8.43204 13.1209C7.16852 12.8676 6.21678 11.7516 6.21678 10.4126C6.21678 10.401 6.21678 10.3889 6.21726 10.3778C6.58946 10.5842 7.0153 10.7089 7.46773 10.723C6.72721 10.2285 6.2395 9.38258 6.2395 8.42456C6.2395 7.91799 6.37532 7.44333 6.61314 7.03537C7.97478 8.70684 10.0107 9.80601 12.3057 9.92202C12.2584 9.71949 12.2347 9.50922 12.2347 9.29219C12.2347 7.76718 13.4711 6.53025 14.9961 6.53025C15.7908 6.53025 16.5076 6.86571 17.0122 7.40224C17.6421 7.2785 18.2318 7.04938 18.7669 6.73181C18.559 7.3771 18.1225 7.91799 17.5507 8.26021C18.11 8.19351 18.6436 8.0456 19.1371 7.82567C18.7688 8.37864 18.3004 8.86538 17.7605 9.25352Z"/>
  </symbol>
  <symbol id="ftr-instagram-icon-svg" width="25" height="24" viewBox="0 0 25 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M12.6209 14.4023C13.9582 14.4023 15.0485 13.3249 15.0485 12C15.0485 11.477 14.8756 10.9941 14.5895 10.5997C14.1486 9.9945 13.4319 9.59766 12.6224 9.59766C11.8124 9.59766 11.0961 9.99401 10.6543 10.5992C10.3672 10.9936 10.1958 11.4765 10.1953 11.9995C10.1938 13.3244 11.2831 14.4023 12.6209 14.4023Z"/>
  <path d="M17.9198 9.06094V7.04724V6.74756L17.6156 6.74853L15.5825 6.75481L15.5903 9.06867L17.9198 9.06094Z"/>
  <path d="M12.6212 0C5.9376 0 0.5 5.38323 0.5 12C0.5 18.6163 5.9376 24 12.6212 24C19.3043 24 24.7424 18.6163 24.7424 12C24.7424 5.38323 19.3053 0 12.6212 0ZM19.5148 10.5997V16.1874C19.5148 17.6428 18.3195 18.8256 16.8504 18.8256H8.39202C6.9224 18.8256 5.72766 17.6428 5.72766 16.1874V10.5997V7.81358C5.72766 6.35866 6.9224 5.17586 8.39202 5.17586H16.8499C18.3195 5.17586 19.5148 6.35866 19.5148 7.81358V10.5997Z"/>
  <path d="M16.3919 11.9999C16.3919 14.0576 14.7006 15.7329 12.6212 15.7329C10.5417 15.7329 8.85095 14.0576 8.85095 11.9999C8.85095 11.5049 8.95055 11.0317 9.12827 10.5996H7.07031V16.1873C7.07031 16.9094 7.66256 17.4943 8.39151 17.4943H16.8494C17.5774 17.4943 18.1706 16.9094 18.1706 16.1873V10.5996H16.1117C16.2909 11.0317 16.3919 11.5049 16.3919 11.9999Z"/>
  </symbol>
  <symbol id="ftr-linkedin-icon-svg" width="25" height="24" viewBox="0 0 25 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.0937 10.2944C14.0666 10.2944 13.6078 10.859 13.3512 11.2554V10.4317H11.4167C11.4419 10.9769 11.4167 16.2519 11.4167 16.2519H13.3512V13.0003C13.3512 12.8268 13.3623 12.6523 13.4145 12.5281C13.5547 12.18 13.8727 11.8199 14.4073 11.8199C15.1072 11.8199 15.3871 12.3536 15.3871 13.1366V16.2504H17.3215H17.322V12.9128C17.321 11.1263 16.3664 10.2944 15.0937 10.2944ZM13.3497 11.2757H13.3376C13.3415 11.2689 13.3473 11.2626 13.3497 11.2558V11.2757Z"/>
  <path d="M8.41016 10.4321H10.3446V16.2523H8.41016V10.4321Z"/>
  <path d="M12.907 0C6.29021 0 0.906982 5.38323 0.906982 12C0.906982 18.6163 6.29021 24 12.907 24C19.5233 24 24.907 18.6163 24.907 12C24.907 5.38323 19.5242 0 12.907 0ZM19.2705 17.4277C19.2705 17.9381 18.847 18.3509 18.3236 18.3509H7.40871C6.88668 18.3509 6.46277 17.9381 6.46277 17.4277V6.38573C6.46277 5.87578 6.88668 5.4625 7.40871 5.4625H18.3236C18.8466 5.4625 19.2705 5.87626 19.2705 6.38573V17.4277Z"/>
  <path d="M9.39048 7.62598C8.72924 7.62598 8.29614 8.06004 8.29614 8.63137C8.29614 9.18966 8.71619 9.63677 9.36486 9.63677H9.37743C10.0522 9.63677 10.4722 9.18966 10.4722 8.63137C10.4592 8.06052 10.0527 7.62598 9.39048 7.62598Z"/>
  </symbol>
  <symbol id="xs-facebook-icon-svg" width="25" height="24" viewBox="0 0 25 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M12.1212 0C5.4376 0 0 5.38323 0 12C0 18.6163 5.4376 24 12.1212 24C18.8043 24 24.2424 18.6163 24.2424 12C24.2424 5.38323 18.8053 0 12.1212 0ZM15.1356 12.4225H13.1636V19.381H10.2415C10.2415 19.381 10.2415 15.5788 10.2415 12.4225H8.8524V9.9631H10.2415V8.37235C10.2415 7.23306 10.7883 5.45283 13.1905 5.45283L15.3558 5.46105V7.84838C15.3558 7.84838 14.04 7.84838 13.7842 7.84838C13.5283 7.84838 13.1646 7.97503 13.1646 8.51833V9.96359H15.391L15.1356 12.4225Z"/>
  </symbol>
  <symbol id="xs-twiter-icon-svg" width="25" height="24" viewBox="0 0 25 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M12.407 0C5.79021 0 0.406982 5.38323 0.406982 12C0.406982 18.6163 5.79021 24 12.407 24C19.0233 24 24.407 18.6163 24.407 12C24.407 5.38323 19.0242 0 12.407 0ZM17.7602 9.25352C17.7656 9.37243 17.7685 9.49231 17.7685 9.61218C17.7685 13.2621 14.991 17.4693 9.90944 17.4693C8.34962 17.4693 6.8976 17.0135 5.67565 16.2294C5.89172 16.2551 6.11165 16.2681 6.33448 16.2681C7.62893 16.2681 8.81945 15.8263 9.76491 15.0858C8.5565 15.0636 7.53612 14.265 7.18472 13.1673C7.35293 13.1992 7.52645 13.2171 7.70385 13.2171C7.95568 13.2171 8.20026 13.1842 8.4318 13.1209C7.16828 12.8676 6.21654 11.7516 6.21654 10.4126C6.21654 10.401 6.21654 10.3889 6.21702 10.3778C6.58921 10.5842 7.01505 10.7089 7.46748 10.723C6.72697 10.2285 6.23925 9.38258 6.23925 8.42456C6.23925 7.91799 6.37508 7.44333 6.6129 7.03537C7.97453 8.70684 10.0105 9.80601 12.3055 9.92202C12.2581 9.71949 12.2344 9.50922 12.2344 9.29219C12.2344 7.76718 13.4709 6.53025 14.9959 6.53025C15.7905 6.53025 16.5074 6.86571 17.012 7.40224C17.6418 7.2785 18.2315 7.04938 18.7666 6.73181C18.5588 7.3771 18.1223 7.91799 17.5505 8.26021C18.1097 8.19351 18.6433 8.0456 19.1369 7.82567C18.7685 8.37864 18.3002 8.86538 17.7602 9.25352Z"/>
  </symbol>
  <symbol id="xs-instagram-icon-svg" width="25" height="24" viewBox="0 0 25 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M12.6208 14.4023C13.9581 14.4023 15.0484 13.3249 15.0484 12C15.0484 11.477 14.8755 10.9941 14.5894 10.5997C14.1485 9.9945 13.4318 9.59766 12.6223 9.59766C11.8123 9.59766 11.096 9.99401 10.6541 10.5992C10.3671 10.9936 10.1957 11.4765 10.1952 11.9995C10.1937 13.3244 11.283 14.4023 12.6208 14.4023Z"/>
  <path d="M17.9198 9.06094V7.04724V6.74756L17.6156 6.74853L15.5825 6.75481L15.5903 9.06867L17.9198 9.06094Z"/>
  <path d="M12.6212 0C5.9376 0 0.5 5.38323 0.5 12C0.5 18.6163 5.9376 24 12.6212 24C19.3043 24 24.7424 18.6163 24.7424 12C24.7424 5.38323 19.3053 0 12.6212 0ZM19.5148 10.5997V16.1874C19.5148 17.6428 18.3195 18.8256 16.8504 18.8256H8.39202C6.9224 18.8256 5.72766 17.6428 5.72766 16.1874V10.5997V7.81358C5.72766 6.35866 6.9224 5.17586 8.39202 5.17586H16.8499C18.3195 5.17586 19.5148 6.35866 19.5148 7.81358V10.5997Z"/>
  <path d="M16.3919 11.9999C16.3919 14.0576 14.7006 15.7329 12.6212 15.7329C10.5417 15.7329 8.85095 14.0576 8.85095 11.9999C8.85095 11.5049 8.95055 11.0317 9.12827 10.5996H7.07031V16.1873C7.07031 16.9094 7.66256 17.4943 8.39151 17.4943H16.8494C17.5774 17.4943 18.1706 16.9094 18.1706 16.1873V10.5996H16.1117C16.2909 11.0317 16.3919 11.5049 16.3919 11.9999Z"/>
  </symbol>
  <symbol id="xs-linkedin-icon-svg" width="25" height="24" viewBox="0 0 25 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.0937 10.2944C14.0666 10.2944 13.6078 10.859 13.3512 11.2554V10.4317H11.4167C11.4419 10.9769 11.4167 16.2519 11.4167 16.2519H13.3512V13.0003C13.3512 12.8268 13.3623 12.6523 13.4145 12.5281C13.5547 12.18 13.8727 11.8199 14.4073 11.8199C15.1072 11.8199 15.3871 12.3536 15.3871 13.1366V16.2504H17.3215H17.322V12.9128C17.321 11.1263 16.3664 10.2944 15.0937 10.2944ZM13.3497 11.2757H13.3376C13.3415 11.2689 13.3473 11.2626 13.3497 11.2558V11.2757Z"/>
  <path d="M8.41028 10.4321H10.3447V16.2523H8.41028V10.4321Z"/>
  <path d="M12.907 0C6.29021 0 0.906982 5.38323 0.906982 12C0.906982 18.6163 6.29021 24 12.907 24C19.5233 24 24.907 18.6163 24.907 12C24.907 5.38323 19.5242 0 12.907 0ZM19.2705 17.4277C19.2705 17.9381 18.847 18.3509 18.3236 18.3509H7.40871C6.88668 18.3509 6.46277 17.9381 6.46277 17.4277V6.38573C6.46277 5.87578 6.88668 5.4625 7.40871 5.4625H18.3236C18.8466 5.4625 19.2705 5.87626 19.2705 6.38573V17.4277Z"/>
  <path d="M9.39048 7.62598C8.72924 7.62598 8.29614 8.06004 8.29614 8.63137C8.29614 9.18966 8.71619 9.63677 9.36486 9.63677H9.37743C10.0522 9.63677 10.4722 9.18966 10.4722 8.63137C10.4592 8.06052 10.0527 7.62598 9.39048 7.62598Z"/>
  </symbol>
  <symbol id="xs-login-icon-svg" width="16" height="18" viewBox="0 0 16 18" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.1575 18H13.3336C13.3336 14.9231 10.7528 12.4207 7.57828 12.4207C4.40379 12.4207 1.82389 14.924 1.82389 18H0C0 13.9163 3.40065 10.5968 7.57919 10.5968C11.7568 10.5968 15.1575 13.9163 15.1575 18Z"/>
  <path d="M7.57918 10.0041C4.82236 10.0041 2.57806 7.75884 2.57806 5.00203C2.57715 2.2443 4.82145 0 7.57918 0C10.3378 0 12.5821 2.24339 12.5821 5.00203C12.5821 7.76066 10.3378 10.0041 7.57918 10.0041ZM7.57918 1.82389C5.82642 1.82389 4.40105 3.24927 4.40105 5.00203C4.40105 6.75479 5.82642 8.18016 7.57918 8.18016C9.33285 8.18016 10.7582 6.75479 10.7582 5.00203C10.7582 3.24927 9.33103 1.82389 7.57918 1.82389Z"/>
  </symbol>
  <symbol id="xs-cart-icon-svg" width="18" height="17" viewBox="0 0 18 17" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.941177C0 0.421384 0.402948 0 0.900001 0H2.7C3.1191 0 3.48272 0.302503 3.57695 0.729543L6.11596 12.2353H13.6973L15.9473 2.82353H9.00001C8.50294 2.82353 8.10001 2.40215 8.10001 1.88235C8.10001 1.36256 8.50294 0.941177 9.00001 0.941177H17.1C17.3771 0.941177 17.6388 1.0747 17.8094 1.30314C17.9799 1.53158 18.0403 1.82945 17.9731 2.11063L15.2731 13.4047C15.173 13.8237 14.813 14.1176 14.4 14.1176H5.40001C4.98088 14.1176 4.61728 13.8152 4.52305 13.3881L1.98404 1.88235H0.900001C0.402948 1.88235 0 1.46097 0 0.941177ZM7.20001 1.88235C7.20001 2.40215 6.79708 2.82353 6.30001 2.82353C5.80294 2.82353 5.40001 2.40215 5.40001 1.88235C5.40001 1.36256 5.80294 0.941177 6.30001 0.941177C6.79708 0.941177 7.20001 1.36256 7.20001 1.88235ZM7.20001 16C7.20001 16.5198 6.79708 16.9412 6.30001 16.9412C5.80294 16.9412 5.40001 16.5198 5.40001 16C5.40001 15.4802 5.80294 15.0588 6.30001 15.0588C6.79708 15.0588 7.20001 15.4802 7.20001 16ZM14.4 16C14.4 16.5198 13.9971 16.9412 13.5 16.9412C13.0029 16.9412 12.6 16.5198 12.6 16C12.6 15.4802 13.0029 15.0588 13.5 15.0588C13.9971 15.0588 14.4 15.4802 14.4 16Z"/>
  </symbol>
  <symbol id="faq-rgt-arrows-icon-svg" width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
  <path d="M9.29688 5.3125H0.703125C0.53125 5.3125 0.390625 5.17188 0.390625 5C0.390625 4.82812 0.53125 4.6875 0.703125 4.6875H9.28125C9.45312 4.6875 9.59375 4.82812 9.59375 5C9.59375 5.17188 9.46875 5.3125 9.29688 5.3125Z"/>
  <path d="M5.85938 8.75C5.78125 8.75 5.70313 8.71875 5.64063 8.65625C5.51562 8.53125 5.51562 8.34375 5.64063 8.21875L8.85938 5L5.64063 1.78125C5.51562 1.65625 5.51562 1.46875 5.64063 1.34375C5.76563 1.21875 5.95313 1.21875 6.07813 1.34375L9.51563 4.78125C9.64063 4.90625 9.64063 5.09375 9.51563 5.21875L6.07813 8.65625C6.01563 8.71875 5.9375 8.75 5.85938 8.75Z"/>
  </symbol>
  <symbol id="faq-lft-arrows-icon-svg" width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
  <path d="M0.703125 5.3125H9.29688C9.46875 5.3125 9.60938 5.17188 9.60938 5C9.60938 4.82812 9.46875 4.6875 9.29688 4.6875H0.71875C0.546875 4.6875 0.40625 4.82812 0.40625 5C0.40625 5.17188 0.53125 5.3125 0.703125 5.3125Z" />
  <path d="M4.14062 8.75C4.21875 8.75 4.29687 8.71875 4.35937 8.65625C4.48438 8.53125 4.48438 8.34375 4.35937 8.21875L1.14062 5L4.35937 1.78125C4.48438 1.65625 4.48438 1.46875 4.35937 1.34375C4.23437 1.21875 4.04687 1.21875 3.92187 1.34375L0.484374 4.78125C0.359374 4.90625 0.359374 5.09375 0.484374 5.21875L3.92187 8.65625C3.98437 8.71875 4.0625 8.75 4.14062 8.75Z"/>
  </symbol>
  <symbol id="bnr-srch-icon-svg" width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
  <path d="M17.7132 24.5851C15.1836 24.5851 12.8467 23.8142 10.8952 22.5133L3.83636 29.5721C3.28201 30.1262 2.36652 30.1262 1.78856 29.5721L0.415327 28.1989C-0.138784 27.6448 -0.138784 26.7293 0.415327 26.1511L7.4983 19.1163C6.19759 17.1649 5.42641 14.828 5.42641 12.2984C5.42641 5.52857 10.9434 0.0115662 17.7132 0.0115662C24.483 0.0115662 30 5.52857 30 12.2984C30 19.0679 24.5071 24.5851 17.7132 24.5851ZM17.7132 4.82991C13.5935 4.82991 10.2448 8.17867 10.2448 12.2984C10.2448 16.418 13.5935 19.7668 17.7132 19.7668C21.8329 19.7668 25.1816 16.418 25.1816 12.2984C25.1816 8.17867 21.8329 4.82991 17.7132 4.82991Z"/>
  </symbol>
  <symbol id="sm-search-icon" width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
  <path d="M8.26616 11.4729C7.08567 11.4729 5.99511 11.1131 5.08444 10.506L1.7903 13.8002C1.5316 14.0588 1.10438 14.0588 0.834661 13.8002L0.193819 13.1593C-0.0647659 12.9008 -0.0647659 12.4735 0.193819 12.2037L3.49921 8.9208C2.89221 8.01013 2.53233 6.91958 2.53233 5.73908C2.53233 2.57985 5.10693 0.00524902 8.26616 0.00524902C11.4254 0.00524902 14 2.57985 14 5.73908C14 8.8982 11.4366 11.4729 8.26616 11.4729ZM8.26616 2.25381C6.34364 2.25381 4.78089 3.81656 4.78089 5.73908C4.78089 7.6616 6.34364 9.22435 8.26616 9.22435C10.1887 9.22435 11.7514 7.6616 11.7514 5.73908C11.7514 3.81656 10.1887 2.25381 8.26616 2.25381Z" />
  </symbol>
  <symbol id="filter-icon" width="18" height="12" viewBox="0 0 18 12" xmlns="http://www.w3.org/2000/svg">
  <path d="M7 12H11V9.99997H7V12ZM0 -3.05176e-05V1.99997H18V-3.05176e-05H0ZM3 6.99997H15V4.99997H3V6.99997Z" />
  </symbol>
  <symbol id="blockquote-icon-svg" width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
  <path d="M45.3322 20.1638H28.5937C28.076 20.1638 27.6562 20.5835 27.6562 21.1013C27.6562 21.6191 28.076 22.0388 28.5937 22.0388H45.3322C45.7694 22.0388 46.125 22.3944 46.125 22.8316V40.8967C46.125 41.3339 45.7693 41.6895 45.3322 41.6895H39.3877C38.87 41.6895 38.4502 42.1092 38.4502 42.627V44.7681L33.4581 41.8198C33.3136 41.7345 33.1491 41.6895 32.9812 41.6895H17.656C17.2189 41.6895 16.8633 41.3339 16.8633 40.8967V22.8316C16.8633 22.3944 17.2189 22.0388 17.656 22.0388H20.25C20.7678 22.0388 21.1875 21.6191 21.1875 21.1013C21.1875 20.5835 20.7678 20.1638 20.25 20.1638H17.656C16.4106 20.1638 15.3617 21.0218 15.0694 22.1778H11.896C11.7283 22.1778 11.5637 22.2228 11.4193 22.3081L6.42703 25.2563V23.1153C6.42703 22.5975 6.00731 22.1778 5.48953 22.1778H2.66775C2.23059 22.1778 1.875 21.8222 1.875 21.385V3.31985C1.875 2.88269 2.23059 2.5271 2.66775 2.5271H30.3439C30.781 2.5271 31.1366 2.88269 31.1366 3.31985V15.1413C31.1366 15.659 31.5563 16.0788 32.0741 16.0788C32.5919 16.0788 33.0116 15.659 33.0116 15.1413V3.31985C33.0116 1.84882 31.8149 0.6521 30.3439 0.6521H2.66775C1.19672 0.6521 0 1.84882 0 3.31985V21.385C0 22.856 1.19672 24.0529 2.66775 24.0529H4.55203V26.8989C4.55203 27.2355 4.7325 27.5463 5.02481 27.7131C5.16891 27.7954 5.32922 27.8364 5.48953 27.8364C5.65444 27.8364 5.81934 27.7929 5.96625 27.7061L12.1522 24.0529H14.9883V40.8968C14.9883 42.3679 16.185 43.5646 17.656 43.5646H32.725L38.9109 47.2179C39.0579 47.3047 39.2227 47.3482 39.3877 47.3482C39.548 47.3482 39.7084 47.3072 39.8524 47.2249C40.1447 47.0581 40.3252 46.7473 40.3252 46.4107V43.5647H45.3322C46.8032 43.5647 47.9999 42.3679 47.9999 40.8969V22.8316C48 21.3605 46.8033 20.1638 45.3322 20.1638Z"/>
  <path d="M24.4726 39.038C24.0171 39.038 23.5912 38.7921 23.3614 38.3963C23.2494 38.2033 23.1904 37.9791 23.1904 37.7474V35.4347C23.1904 34.7284 23.7648 34.1538 24.4708 34.1538C25.1406 34.1538 25.6127 33.977 25.9139 33.6131C26.282 33.1687 26.3828 32.477 26.3877 31.922H24.4722C23.5191 31.922 22.7437 31.1465 22.7437 30.1934V27.3062C22.7437 26.3531 23.5191 25.5776 24.4722 25.5776H29.531C30.4841 25.5776 31.2595 26.353 31.2595 27.3062V31.3425C31.2595 31.3558 31.2538 32.7278 31.2287 32.9761C30.9302 35.9178 28.6559 38.3479 25.6978 38.8856C25.2392 38.969 24.862 39.0182 24.5447 39.0361C24.5202 39.0375 24.4963 39.038 24.4726 39.038ZM24.4411 37.1638C24.4389 37.1639 24.4366 37.1641 24.4342 37.1642C24.4365 37.1641 24.4387 37.1639 24.4411 37.1638ZM25.0654 35.994V37.0913C25.1593 37.0764 25.2584 37.0597 25.3625 37.0407C27.5034 36.6516 29.1485 34.9023 29.3632 32.7869C29.374 32.638 29.3845 31.6087 29.3845 31.3424V27.4524H24.6187V30.0469H27.2517C27.7021 30.0469 28.0888 30.367 28.1728 30.8095C28.2204 31.0606 28.6025 33.306 27.3582 34.8089C26.9599 35.2899 26.2521 35.8508 25.0654 35.994Z"/>
  <path d="M33.707 39.038C33.2514 39.038 32.8256 38.7921 32.5957 38.3963C32.4838 38.2033 32.4247 37.9791 32.4247 37.7474V35.4347C32.4247 34.7284 32.9992 34.1538 33.7052 34.1538C34.375 34.1538 34.8471 33.977 35.1483 33.6131C35.5163 33.1687 35.6172 32.477 35.6221 31.922H33.7066C32.7534 31.922 31.978 31.1465 31.978 30.1934V27.3062C31.978 26.3531 32.7534 25.5776 33.7065 25.5776H38.7652C39.7184 25.5776 40.4938 26.353 40.4938 27.3062V31.3425C40.4938 31.3558 40.4881 32.7278 40.463 32.9761C40.1645 35.9178 37.8902 38.3479 34.9321 38.8856C34.4736 38.969 34.0963 39.0182 33.779 39.0361C33.7546 39.0375 33.7307 39.038 33.707 39.038ZM33.6754 37.1638C33.6732 37.1639 33.671 37.1641 33.6686 37.1642C33.6709 37.1641 33.6731 37.1639 33.6754 37.1638ZM34.2997 35.994V37.0913C34.3937 37.0764 34.4928 37.0597 34.5968 37.0407C36.7378 36.6516 38.3829 34.9023 38.5976 32.7869C38.6084 32.638 38.6189 31.6087 38.6189 31.3424V27.4524H33.853V30.0469H36.486C36.9364 30.0469 37.3231 30.367 37.4071 30.8095C37.4547 31.0606 37.8368 33.306 36.5925 34.8089C36.1942 35.2899 35.4864 35.8508 34.2997 35.994Z"/>
  <path d="M23.3464 18.6583H18.2876C17.3345 18.6583 16.5591 17.8829 16.5591 16.9297V12.8934C16.5591 12.8801 16.5648 11.5085 16.5899 11.2598C16.8884 8.31813 19.1627 5.88803 22.1208 5.35029C22.5797 5.26685 22.9569 5.21763 23.274 5.19982C23.2988 5.19832 23.3223 5.19775 23.346 5.19775C23.8018 5.19775 24.2276 5.44375 24.4573 5.83975C24.569 6.03194 24.6283 6.25638 24.6283 6.48832V8.80113C24.6283 9.50744 24.0538 10.082 23.3478 10.082C22.6801 10.082 22.2091 10.2576 21.9079 10.6189C21.5372 11.0634 21.4353 11.7541 21.4311 12.3139H23.3464C24.2996 12.3139 25.0751 13.0893 25.0751 14.0425V16.9297C25.075 17.8829 24.2995 18.6583 23.3464 18.6583ZM18.4341 16.7833H23.2V14.1889H20.567C20.1166 14.1889 19.7299 13.8688 19.6459 13.4263C19.5983 13.1752 19.2162 10.9297 20.4605 9.42691C20.8587 8.94597 21.5666 8.38507 22.7533 8.24172V7.14447C22.6594 7.15928 22.5603 7.17607 22.4563 7.195C20.3153 7.58416 18.6701 9.33344 18.4555 11.4488C18.4449 11.5944 18.4342 12.6349 18.4342 12.8933V16.7833H18.4341ZM23.384 7.07163C23.382 7.07172 23.3801 7.07182 23.3781 7.07191C23.3801 7.07182 23.382 7.07172 23.384 7.07163Z"/>
  <path d="M14.112 18.6583H9.05327C8.10011 18.6583 7.32471 17.8829 7.32471 16.9297V12.8934C7.32471 12.8801 7.33043 11.5085 7.35564 11.2598C7.65414 8.31813 9.92843 5.88803 12.8865 5.35029C13.3454 5.26685 13.7226 5.21763 14.0397 5.19982C14.0645 5.19832 14.088 5.19775 14.1117 5.19775C14.5675 5.19775 14.9933 5.44375 15.2231 5.83975C15.3347 6.03194 15.394 6.25638 15.394 6.48832V8.80113C15.394 9.50744 14.8196 10.082 14.1135 10.082C13.4458 10.082 12.9748 10.2576 12.6736 10.6189C12.3029 11.0634 12.201 11.7541 12.1968 12.3139H14.1121C15.0653 12.3139 15.8408 13.0893 15.8408 14.0425V16.9297C15.8406 17.8829 15.0651 18.6583 14.112 18.6583ZM9.19971 16.7833H13.9656V14.1889H11.3326C10.8822 14.1889 10.4955 13.8688 10.4115 13.4263C10.3639 13.1752 9.98177 10.9297 11.2261 9.42691C11.6244 8.94597 12.3322 8.38507 13.5189 8.24172V7.14447C13.425 7.15928 13.3259 7.17607 13.2219 7.195C11.0809 7.58416 9.43568 9.33344 9.22108 11.4488C9.21049 11.5944 9.19971 12.6349 9.19971 12.8933V16.7833ZM14.1496 7.07163C14.1477 7.07172 14.1457 7.07182 14.1437 7.07191C14.1457 7.07182 14.1476 7.07172 14.1496 7.07163Z"/>
  <path d="M24.5625 22.0387C24.5016 22.0387 24.4397 22.0321 24.3797 22.0199C24.3197 22.0087 24.2606 21.9899 24.2044 21.9665C24.1472 21.9431 24.0928 21.914 24.0422 21.8801C23.9906 21.8464 23.9428 21.807 23.8997 21.7639C23.8566 21.7208 23.8172 21.673 23.7834 21.6214C23.7497 21.5708 23.7206 21.5164 23.6972 21.4592C23.6738 21.403 23.655 21.3439 23.6437 21.2839C23.6316 21.2239 23.625 21.162 23.625 21.1011C23.625 21.0402 23.6316 20.9783 23.6437 20.9183C23.655 20.8583 23.6738 20.7992 23.6972 20.742C23.7206 20.6858 23.7497 20.6314 23.7834 20.5808C23.8172 20.5292 23.8566 20.4814 23.8997 20.4383C23.9428 20.3952 23.9906 20.3558 24.0422 20.322C24.0928 20.2883 24.1472 20.2592 24.2044 20.2358C24.2606 20.2123 24.3197 20.1936 24.3797 20.1823C24.5006 20.158 24.6244 20.158 24.7453 20.1823C24.8053 20.1936 24.8644 20.2123 24.9206 20.2358C24.9778 20.2592 25.0322 20.2883 25.0828 20.322C25.1344 20.3558 25.1822 20.3952 25.2253 20.4383C25.2684 20.4814 25.3078 20.5292 25.3416 20.5808C25.3753 20.6314 25.4044 20.6858 25.4278 20.742C25.4513 20.7992 25.47 20.8583 25.4822 20.9183C25.4944 20.9783 25.5 21.0402 25.5 21.1011C25.5 21.162 25.4944 21.2239 25.4822 21.2839C25.47 21.3439 25.4513 21.403 25.4278 21.4592C25.4044 21.5164 25.3753 21.5708 25.3416 21.6214C25.3078 21.673 25.2684 21.7208 25.2253 21.7639C25.1822 21.807 25.1344 21.8464 25.0828 21.8801C25.0322 21.9139 24.9778 21.9431 24.9206 21.9665C24.8644 21.9899 24.8053 22.0087 24.7453 22.0199C24.6853 22.0321 24.6234 22.0387 24.5625 22.0387Z"/>
  </symbol>
</svg>  
<?php 
$logoObj = get_field('hdlogo', 'options');
if( is_array($logoObj) ){
  $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
}else{
  $logo_tag = '';
}
?>
<div class="bdoverlay"></div>
<header class="header">
  <div class="header-tp">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="header-tp-inr clearfix">
            <div class="hdr-tp-lft">
              <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                  <?php echo $logo_tag; ?>
                </a>
              </div>
            </div>
            <div class="hdr-tp-rgt clearfix">
              <div class="xs-menu-bar-humberger show-md">
                <div class="xs-humbergur-btn">
                  <span><img src="assets/images/xs-humbergar-icon.png"></span>
                  <strong>Menu</strong>
                </div>
              </div>
              <div class="hdr-tp-rgt-menu-contlr hide-md">
                <div class="hdr-tp-icons-cntlr clearfix">
                <div class="hdr-sign-up">
                  <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
                    <i>
                      <svg class="hdr-tp-sign-up-icon-svg" width="16" height="18" viewBox="0 0 16 18" fill="#1E1E1E">
                        <use xlink:href="#hdr-tp-sign-up-icon-svg"></use>
                      </svg> 
                    </i>
                  </a>
                </div>
                <div class="hdr-tp-cart-btn">
                  <a href="<?php echo wc_get_cart_url(); ?>">
                    <i>
                      <svg class="hdr-tp-cart-icon-svg" width="18" height="17" viewBox="0 0 18 17" fill="#FFFFFF">
                        <use xlink:href="#hdr-tp-cart-icon-svg"></use>
                      </svg> 
                    </i>
                    <?php 
                    if( WC()->cart->get_cart_contents_count() > 0 ){
                      echo sprintf ( '<span>%d</span>', WC()->cart->get_cart_contents_count() );
                    }else{
                      echo sprintf ( '<span>%d</span>', 0 );
                    }  
                    ?>
                  </a>
                </div>
              </div>
              <nav class="main-nav">
                  <?php 
                  $cmenuOptions = array( 
                      'theme_location' => 'cbv_main_menu', 
                      'menu_class' => 'clearfix reset-list',
                      'container' => '',
                      'container_class' => ''
                    );
                  wp_nav_menu( $cmenuOptions ); 
                ?>
              </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php 
  $shop_features = get_field('shop_features', 'options'); 
  if( $shop_features ):
  ?>
  <div class="header-btm hide-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="hdr-btm-service-innr">
            <div class="hdr-btm-service-wrp">
              <ul class="clearfix reset-list">
                <?php foreach( $shop_features as $sfeature ): ?>
                <li>
                  <div class="hdr-btm-service-item">
                    <i>
                      <svg class="hdr-btm-star-icon-svg" width="28" height="27" viewBox="0 0 28 27" fill="#FFFFFF">
                        <use xlink:href="#hdr-btm-star-icon-svg"></use>
                      </svg> 
                      </i>
                    <?php if( !empty($sfeature['titel']) ) printf('<span>%s</span>', $sfeature['titel']); ?>
                  </div>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
</header>