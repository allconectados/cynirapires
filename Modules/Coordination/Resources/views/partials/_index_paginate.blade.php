<div class="container d-print-none text-center">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="d-flex justify-content-start">
                @if(isset($data))
                    {!! $data->appends(Request::all())->links() !!}
                @else
                    {!! $data->links() !!}
                @endif
            </div>
        </div>
    </div>
</div>
