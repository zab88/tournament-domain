<?php
    $trn_stages = json_decode($site['urls']);
    $trn_stages_num = max( count($trn_stages), 1);
?>

<div class="container">
    <h2 class="text-center">Настройки сайта</h2>

    <form class="form-horizontal" role="form" method="post" action="">
        <input type="hidden" value="<?php if ($trn) echo($trn['t_id']); ?>" name="tournament_id" />
        <div class="form-group">
            <label for="trn_name" class="col-sm-4 control-label">Общее называние сайта</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="trn_name" name="name" value="<?php echo $site['name']; ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label">Текст описания</label>
            <div class="col-sm-8">
                <textarea class="form-control" rows="3" name="desc"><?php echo $site['description']; ?></textarea>
            </div>
        </div>

        <div id="stages_wrap">
            <?php for($i=0; $i<$trn_stages_num; $i++){ ?>
                <div class="form-group js-stage">
                    <label class="col-sm-4 control-label">Ссылка на турнир <span><?php echo ($i+1); ?></span></label>
                    <div class="col-sm-<?php echo ($i>0) ? '7' : '8'; ?>">
                        <input type="text" class="form-control" name="trn_stages[]" value="<?php echo $trn_stages[$i] ?>">
                    </div>
                    <?php if ($i>0){ ?>
                        <div class="col-sm-1">
                            <button type="button" class="btn btn-default js-stage-remove">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

        <div id="stages_tpl" style="display: none">
            <div class="form-group js-stage" >
                <label class="col-sm-4 control-label">Ссылка на турнир <span></span></label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="trn_name" name="trn_stages[]" value="">
                </div>
                <div class="col-sm-1">
                    <button type="button" class="btn btn-default js-stage-remove">
                        <span class="glyphicon glyphicon-remove"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <button id="trn_add_stage" type="button" class="btn btn-info">
                    <b class="glyphicon-plus"></b>
                    Добавить ссылку на турнир
                </button>
                <button id="trn_mega_create" type="submit" class="btn btn-success">
                    Сохранить изменения
                </button>
            </div>
        </div>
    </form>

</div>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            $('#trn_add_stage').click(function(event){
                event.preventDefault()
                $('#stages_tpl > div').clone().appendTo('#stages_wrap')
                countStages()
            })
            $('#stages_wrap').on("click", ".js-stage-remove", function(event){
                event.preventDefault()
                $(this).closest(".form-group").remove()
                countStages()
            })

            //check that all fields are correct
            $('#trn_mega_create').click(function(event){
                if ($('#trn_name').val() == ""){
                    event.preventDefault()
                    $('#trn_name').closest(".form-group").addClass('has-error')
                }
                //removing hidden tpl. it prevent sending unnecessary data
                $('#stages_tpl').remove()
            })
        })

        function countStages(){
            var num = 1
            $('.js-stage label span').each(function(){
                $(this).text(num++)
            })
        }
    </script>