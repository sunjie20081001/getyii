$(function(){

    //Chapter {cousre_id :1 , chapters:array()}
    var courses = [];

    /**
     * 渲染章节
     * @param data
     */
    function renderChapter(data){
        var html = '';
        $.each(data, function(d){
            html += '<option value="'+ this.id+'" '+(window.videoChapterId == this.id?'selected':'')+' >'+ this.title+'</option>';
        });
        $('#video-chapter_id').html(html);
    }
    /**
     * 渲染章节 select
     * @param course_id
     */
    function changeChapterByCourse(course_id){
        //查看Course 中是否有 course_id;
        var isPost = true;
        var chapters = {};

        $.each(courses, function(){
            if(course_id == this.course_id){
                isPost = false;
                chapters = this.chapters;
                return false;
            }
        });
        if(isPost){
            $.post(chapterListUrl, {course_id : courseCurrentId} ,function(data){
                var course = {course_id : courseCurrentId, chapters:data};
                courses.push(course);
                renderChapter(data);
            });
        }else{
            renderChapter(chapters);
        }

    }

    var courseCurrentId = $('select#video-course_id').val();
    //ajax
    changeChapterByCourse(courseCurrentId);

    $('#video-course_id').change(function(){
        courseCurrentId = $('select#video-course_id').val();
        changeChapterByCourse(courseCurrentId);
    });
});