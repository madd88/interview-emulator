<h1>Эмулятор тестирования</h1>
<form id="testForm">
    <div class="input-group mb-4">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Уровень интеллекта</span>
            </div>
            <input name="iq" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
    </div>
    <button onclick="return getTestResult()" type="button" class="btn btn-primary btn-block">Тестировать</button>
</form>
<hr/>
<h2>Результаты</h2>
<h3 id="results_num"></h3>
<table id="test_results" class="display" style="width:100%">
    <thead>
    <tr>
        <th>#</th>
        <th>ID</th>
        <th>Использовался</th>
        <th>Сложностиь</th>
        <th>Верно ответил</th>
    </tr>
    </thead>

</table>
<!-- Modal -->
<div class="modal fade" id="question_level_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Сложность вопросов</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="question_level">
                    <input type="text" name="level" id="range_level">
                    <input type="hidden" name="save" value="1">
                    <input type="hidden" name="save" value="1">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-success" onclick="return saveQuestionLevel('question_level')">Сохранить</button>
            </div>
        </div>
    </div>
</div>
