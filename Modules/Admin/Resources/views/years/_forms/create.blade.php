<div class="container">
    <div class="row border-bottom p-3">
        <div class="col-sm-12 col-md-12 col-lg-10 col-xl-10">
                <span>Para iniciar o ano letivo, clique no botão ao lado.
                </span>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
            <form action="{{route('admins.years.store') }}" method="post">
                @csrf
                <input type="hidden" name="code" class="form-control form-control-sm" value="{{uniqid()}}" readonly>
                <button type="submit" name="title" value="{{date('Y')}}"
                        class="btn btn-sm btn-primary btn-block">Novo Ano
                </button>
            </form>
        </div>
    </div>
</div>