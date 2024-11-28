// Date PickerBootstrap

$('#dateSingleInput').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    calendarWeeks: true,
    clearBtn: true,
    disableTouchKeyboard: true,
    language: 'es'
}).on('changeDate', function(e) {
    // Actualizar el valor del input
    const selectedDate = e.format('dd-mm-yyyy');   
    Livewire.dispatch('bindingDateBorn', { date: selectedDate});
});