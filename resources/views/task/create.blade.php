<form action="/tasks" method="post" id="form-task">
    @csrf
    <div>
        <b>Nome</b>
        <input type="text" name="name" id="name" class="form-control" placeholder="Digite aqui o nome">
    </div>

    <div class="mt-2">
        <b>Descrição</b>
        <textarea name="description" id="description" rows="3" class="form-control" placeholder="Digite aqui a descrição"></textarea>
    </div>

    <div class="mt-2">
        <h4>Prioridade</h4>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="priority" id="inlineRadio1" value="1" checked>
            <label class="form-check-label" for="inlineRadio1">Baixa</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="priority" id="inlineRadio2" value="2">
            <label class="form-check-label" for="inlineRadio2">Média</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="priority" id="inlineRadio3" value="3">
            <label class="form-check-label" for="inlineRadio3">Alta</label>
        </div>
    </div>

    <div class="mt-2">
        <h4>Cor</h4>
        <label for="color">Selecione uma cor</label>
        <input type="color" id="color" name="color" value="#03d5ff" onchange="changeColor(event)">
    </div>

</form>


<script>
    function changeColor(event)
    {
        let color = event.target.value;
        console.log(color);
    }
</script>

