//elRTE.prototype.options.panels.web2pyPanel = [
//    'bold', 'italic', 'underline', 'forecolor', 'justifyleft', 'justifyright',
//    'justifycenter', 'justifyfull', 'insertorderedlist', 'insertunorderedlist',
//    'link'
//];
//elRTE.prototype.options.toolbars.web2pyToolbar = ['web2pyPanel'];
//
//$(function() {
//    var opts = {
//        cssClass : 'el-rte',
//        lang     : 'zh_TW',
//        height   : 450,
//        toolbar  : 'web2pyToolbar',
//        cssfiles : ['/lib/elrte/css/elrte-inner.css']
//    }
//    $('textarea.html').elrte(opts);
//
//    $('form').submit(function () {
//        $('textarea.html').elrte('updateSource');
//        return true;
//    });
//})