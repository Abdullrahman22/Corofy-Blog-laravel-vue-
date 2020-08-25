(function ($) {
    // USE STRICT
    "use strict";
  
    $(".upload-input #post-img").change(function(e) {
        var filename = this.files[0].name
        $(".upload-input > label > span").text(filename)
    });


})(jQuery);