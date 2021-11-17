@extends('backend.layouts.app')

@section('content')

<h4 class="text-center text-muted">{{translate('POS Activation for Seller')}}</h4>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('POS Activation for Seller')}}</h5>
            </div>
            <div class="card-body text-center">
                <label class="sismoo-switch sismoo-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'pos_activation_for_seller')" @if($pos_activation != null && $pos_activation->value == 1) checked @endif>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        function updateSettings(el, type){
            if($(el).is(':checked')){
                var value = 1;
            }
            else{
                var value = 0;
            }
            $.post('{{ route('settings.update.activation') }}', {_token:'{{ csrf_token() }}', type:type, value:value}, function(data){
                if(data == '1'){
                    SISMOO.plugins.notify('success', '{{ translate('Settings updated successfully') }}');
                }
                else{
                    SISMOO.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }
    </script>
@endsection
