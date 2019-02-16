<h2>Результаты</h2>
<h3 id="results_num"></h3>
<table id="test_results" class="display" style="width:100%">
    <thead>
    <tr>
        <th>#</th>
        <th>IQ</th>
        <th>Диапазон сложности</th>
        <th>Результат</th>
    </tr>
    </thead>
    <tbody>
        <?php
            foreach($data as $item){
                echo "<tr>";
        echo "<td>{$item['id']}</td><td>{$item['iq']}</td><td>{$item['diff']}</td><td>{$item['result']}</td>";
                echo "</td>";

            }
        ?>
    </tbody>
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
