$(document).ready(function () { // вся мaгия пoслe зaгрузки стрaницы

// перебор div
//function hidePosts(){ 
//  var hideText = "текст";
//  var posts = document.querySelectorAll("._post.post");
//  for (var i = 0; i<posts.length; i++) {
//    var post = posts[i].querySelector(".wall_post_text");
//    if (post.innerText.indexOf(hideText) != -1 )
//    {
//      posts[i].style.display = "none";
//    }
//  }
//}


    $('body').on('click', '.get_checks', function (event) {

        // alert('2323');
//        $(this).removeClass("show_job_tab");
//        $(this).addClass("show_job_tab2");
//        var $uri_query = '';
//        var $vars = [];
        // var $vars = serialize(this.attributes);
        // var $vars =  JSON.stringify(this.attributes);
        var resto = '';
        var $vars = new Array();
        var $uri_query = '';
        
        var showid = 0;
        
        
        var hidethis = 0;
        var answer = 0;
        var resto = '';
        var showid = '';

        $.each(this.attributes, function () {

            if (this.specified) {

                if (this.name.indexOf("forajax_") != -1) {
                    $uri_query = $uri_query + '&' + this.name.replace('forajax_','') + '=' + this.value;
                    console.log(this.name, this.value);
                }

                
                // $uri_query = $uri_query + '&' + this.name + '=' + this.value.replace(' ', '..')
                
//                forajax_sp="{{ sp_now }}" 
//                forajax_jobman="{{ man.id }}" 
//                forajax_datestart="{{ date_start }}"  
//                forajax_datefin="{{ date_finish }}" 
                
//
                if (this.name == 'hidethis' ) {
                    hidethis = 1;
                }
                
                if (this.name == 'show_id') {
                    showid = '#' + this.value;
                }
                else if (this.name == 'res_to_id') {
                    resto = '#' + this.value;
                }
                else if (this.name == 'answer') {
                    answer = this.value;
                }
//                if (this.name == 'resto') {
//                    resto = '#' + this.value;
//                    //console.log($vars['resto']);
//                    // alert($res_to);
//                }
//
//                if (this.name == 'show_on_click') {
//                    $('#' + this.value).show('slow');
//                }

            }

        });

        if (answer != 0) {

            if (!confirm(answer)) {
                return false;
            }

        }

//        alert($uri_query);
//        return false;

        // console.log($vars['resto']);

        // console.log($uri_query);
        //$(this).html("тут список");
        var $th = $(this);

        $.ajax({

            url: "/vendor/didrive_mod/iiko_checks/ajax.php",
            data: "t=1" + $uri_query,
            cache: false,
            dataType: "json",
            type: "post",

            beforeSend: function () {
                
                $( resto ).html('<img src="/img/load.gif" alt="" border=0 />');
                
                /*
                 if (typeof $div_hide !== 'undefined') {
                 $('#' + $div_hide).hide();
                 }
                 */
//                $("#ok_but_stat").show('slow');
//                $("#ok_but").hide();
            }
            ,

            success: function ($j) {


                if (showid != 0) {
                    $(showid).show('slow');
                }

                if (hidethis == 1) {
                    $th.hide();
                }

                $( resto ).html('<div style="background-color:yellow;color:red;padding:5px;">'+$j.html+'</div>');

                //alert(resto);

                // $($res_to).html($j.data);
                // $($vars['resto']).html($j.data);
                //$(resto).html($j.html);

                // $th("#main").prepend("<div id='box1'>1 блок</div>");                    
                // $th("#main").prepend("<div id='box1'>1 блок</div>");                    
                // $th.html( $j.html + '<br/><A href="">Сделать ещё заявку</a>');
                // $($res_to_id).html( $j.html + '<br/><A href="">Сделать ещё заявку</a>');

                // return true;

                /*
                 // alert($j.html);
                 if (typeof $div_show !== 'undefined') {
                 $('#' + $div_show).show();
                 }
                 */
//                $('#form_ok').hide();
//                $('#form_ok').html($j.html + '<br/><A href="">Сделать ещё заявку</a>');
//                $('#form_ok').show('slow');
//                $('#form_new').hide();
//
//                $('.list_mag').hide();
//                $('.list_mag_ok').show('slow');

            }

        });


        return false;

    });
    // else {
    // alert(i + ': ' + $(elem).text());
    // }


    $('body').on('click', '.edit_items_dop_values', function (event) {

        // alert('2323');
//        $(this).removeClass("show_job_tab");
//        $(this).addClass("show_job_tab2");
//        var $uri_query = '';
//        var $vars = [];
        // var $vars = serialize(this.attributes);
        // var $vars =  JSON.stringify(this.attributes);
        var res_to_id = '';
        var $vars = new Array();
        var $uri_query = '';
        var hidethis = 0;
        var showid = 0;
        var answer = 0;
        var msg_to_success = 0;

        $.each(this.attributes, function () {

            if (this.specified) {

                // console.log(this.name, this.value);
                // $uri_query = $uri_query + '&' + this.name + '=' + this.value.replace(' ', '..')
                $uri_query = $uri_query + '&' + this.name + '=' + this.value;
//
                if (this.name == 'hidethis' && this.value == 'da') {
                    hidethis = 1;
                } else if (this.name == 'show_id') {
                    showid = '#' + this.value;
                } else if (this.name == 'comit_answer') {
                    answer = this.value;
                } else if (this.name == 'msg_to_success') {
                    msg_to_success = this.value;
                } else if (this.name == 'res_to_id') {
                    res_to_id = $('#' + this.value);
                    //console.log($vars['resto']);
                    // alert($res_to);
                }
//
//                if (this.name == 'show_on_click') {
//                    $('#' + this.value).show('slow');
//                }

            }

        });

        if (answer != 0) {
            if (!confirm(answer)) {
                return false;
            }
        }

//        alert($uri_query);
//        return false;

        // console.log($vars['resto']);

        // console.log($uri_query);
        //$(this).html("тут список");
        var $th = $(this);

        $.ajax({

            url: "/vendor/didrive_mod/items/1/didrive/ajax.php",
            data: "t=1" + $uri_query,
            cache: false,
            dataType: "json",
            type: "post",

            beforeSend: function () {
                /*
                 if (typeof $div_hide !== 'undefined') {
                 $('#' + $div_hide).hide();
                 }
                 */
                // $("#ok_but_stat").html('<img src="/img/load.gif" alt="" border=0 />');
//                $("#ok_but_stat").show('slow');
//                $("#ok_but").hide();
            }
            ,

            success: function ($j) {

                //alert(resto);

                // $($res_to).html($j.data);
                // $($vars['resto']).html($j.data);
                // $(resto).html($j.html);

                if ($j.status == 'ok') {

                    if (showid != 0) {
                        $(showid).show('slow');
                    }

                    if (hidethis == 1) {
                        $th.hide();
                    }

                    if (msg_to_success != 0) {
                        res_to_id.html('<b class="warn" >' + msg_to_success + '</b>');
                    } else {
                        res_to_id.html('<b class="warn" >' + $j.html + '</b>');
                    }

                    // $th("#main").prepend("<div id='box1'>1 блок</div>");                    
                    // $th("#main").prepend("<div id='box1'>1 блок</div>");                    
                    // $th("#main").prepend("<div id='box1'>1 блок</div>");                    
                    // $th.html( $j.html + '<br/><A href="">Сделать ещё заявку</a>');
                    // $($res_to_id).html( $j.html + '<br/><A href="">Сделать ещё заявку</a>');

                    // return true;

                    /*
                     // alert($j.html);
                     if (typeof $div_show !== 'undefined') {
                     $('#' + $div_show).show();
                     }
                     */
//                $('#form_ok').hide();
//                $('#form_ok').html($j.html + '<br/><A href="">Сделать ещё заявку</a>');
//                $('#form_ok').show('slow');
//                $('#form_new').hide();
//
//                $('.list_mag').hide();
//                $('.list_mag_ok').show('slow');
                }
// если ошибка
                else {

                    if (showid != 0) {
                        $(showid).show('slow');
                    }
                    res_to_id.html('<b class="warn" >' + $j.html + '</b>');

                }
            }

        });

        return false;

    });
    // else {
    // alert(i + ': ' + $(elem).text());
    // }

});