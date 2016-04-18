{{-- Pega o valor do SelectBox Categoria --}}
@if(!empty($question->category[0]->pivot->category_id))
    {{--*/ $value = $question->category[0]->pivot->category_id /*--}}
@else
    {{--*/ $value = null /*--}}
@endif

{{-- Pega o valor do SelectBox Tipo --}}
@if(!empty($question->type))
    {{--*/ $type = $question->type /*--}}
@else
    {{--*/ $type = null /*--}}
@endif

{{-- Pega o valor do SelectBox Resposta --}}
@if(!empty($question->answer[0]->answer))
    {{--*/ $a = $question->answer[0]->answer /*--}}
@else
    {{--*/ $a = null /*--}}
@endif

<div class="col-lg-2">
    <div class="form-group">
        {!! Form::label('category_id', 'Categoria', null, ['class' => 'control-label']) !!}
        {!! Form::select('category_id', $category->lists('category_name_en', 'id'),
            $value, ['class' => 'form-control']
        ) !!}
    </div>
</div>

<div class="col-lg-2">
    <div class="form-group">
        {!! Form::label('question_type', 'Tipo', null, ['class' => 'control-label']) !!}
        {!! Form::select('question_type', ['text' => 'Text', 'radio' => 'Radio', 'checkbox' => 'Checkbox'],
            $type, ['class' => 'form-control']
        ) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        {!! Form::label('question_name_en', 'Questão Inglês', ['class' => 'control-label']) !!}
        {!! Form::text('question_name_en', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        {!! Form::label('question_name_pt', 'Questão Português', ['class' => 'control-label']) !!}
        {!! Form::text('question_name_pt', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="answer-fields">
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('answer[0][answer_name_en]', 'Opção Inglês', ['class' => 'control-label']) !!}
            {!! Form::text('answer[0][answer_name_en]', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-lg-5">
        <div class="form-group">
            {!! Form::label('answer[0][answer_name_pt]', 'Opção Português', ['class' => 'control-label']) !!}
            {!! Form::text('answer[0][answer_name_pt]', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-lg-2">
        <div class="form-group">
            {!! Form::label('answer[0][answer]', 'Resposta', null, ['class' => 'control-label']) !!}
            {!! Form::select('answer[0][answer]', ['false' => 'Falso', 'true' => 'Verdadeiro'], $a, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-lg-1 text-right" style="margin-top:25px;">
        <button class="add_field_button btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></button>
    </div>
</div>

@if(!empty($answer))
    @for($i = 1; $i < count($answer); $i++)
        {{--*/ $name_en = 'answer['.$i.'][answer_name_en]' /*--}}
        {{--*/ $name_pt = 'answer['.$i.'][answer_name_pt]' /*--}}
        {{--*/ $answern = 'answer['.$i.'][answer]' /*--}}
        {{--*/ $answers = $question->answer[$i]->answer /*--}}
        <div class="answer-fields">
            <div class="remove">
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label($name_en, 'Opção Inglês', ['class' => 'control-label']) !!}
                        {!! Form::text($name_en, null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="form-group">
                        {!! Form::label($name_pt, 'Opção Português', ['class' => 'control-label']) !!}
                        {!! Form::text($name_pt, null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="form-group">
                        {!! Form::label($answern, 'Resposta', null, ['class' => 'control-label']) !!}
                        {!! Form::select($answern, ['false' => 'Falso', 'true' => 'Verdadeiro'], $answers, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="col-lg-1 text-right" style="margin-top:25px;">
                    <a href="#" class="remove_field btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    @endfor
@endif

<script type="text/javascript">
    $(document).ready(function(){
        var max_fields      = 4; //maximum input boxes allowed
        var wrapper         = $(".answer-fields"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID
        var x               = wrapper.size(); //initlal text box count

        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x <= max_fields){ //max input box allowed
                var c = x++; //text box increment
                $(wrapper).append(
                    '<div class="answer-fields">'+
                    '   <div class="remove">'+
                    '       <div class="col-lg-4">'+
                    '           <div class="form-group">'+
                    '               {!! Form::label("answer['+c+'][answer_name_en]", "Opção Inglês", ["class" => "control-label"]) !!}'+
                    // Aqui está comentado, pois estou aguardando para verificar se é um bug do laravelcollective
                    //'               {!! Form::text("answer[][answer_name_en]", null, ["class" => "form-control"]) !!}'+
                    '               <input class="form-control" name="answer['+c+'][answer_name_en]" type="text" id="answer['+c+'][answer_name_en]">'+
                    '           </div>'+
                    '       </div>'+
                    '       <div class="col-lg-5">'+
                    '           <div class="form-group">'+
                    '               {!! Form::label("answer['+c+'][answer_name_pt]", "Opção Português", ["class" => "control-label"]) !!}'+
                    // Aqui está comentado, pois estou aguardando para verificar se é um bug do laravelcollective
                    //'               {!! Form::text("answer[][answer_name_pt]", null, ["class" => "form-control"]) !!}'+
                    '               <input class="form-control" name="answer['+c+'][answer_name_pt]" type="text" id="answer['+c+'][answer_name_pt]">'+
                    '           </div>'+
                    '       </div>'+
                    '       <div class="col-lg-2">'+
                    '           <div class="form-group">'+
                    '               {!! Form::label("answer['+c+'][answer]", "Resposta", null, ["class" => "control-label"]) !!}'+
                    // Aqui está comentado, pois estou aguardando para verificar se é um bug do laravelcollective
                    //'               {!! Form::select("answer[][answer]", ["false" => "Falso", "true" => "Verdadeiro"], null, ["class" => "form-control"]) !!}'+
                    '               <select class="form-control" name="answer['+c+'][answer]" id="answer['+c+'][answer]"><option value="false">Falso</option><option value="true">Verdadeiro</option></select>'+
                    '           </div>'+
                    '       </div>'+
                    '       <div class="col-lg-1 text-right" style="margin-top:25px;">'+
                    '           <a href="#" class="remove_field btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></a>'+
                    '       </div>'+
                    '   </div>'+
                    '</div>'
                ); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).closest('.answer-fields').remove(); x--;
        })
    });
</script>
