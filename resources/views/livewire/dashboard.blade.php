<div>
    {{-- <x-tailwind.z_general_report /> --}}
    {{-- <x-tailwind.z_strat_analytics /> --}}
    {{-- <x-tailwind.z_sales_overview /> --}}
    <x-tailwind.z_start_numbers />
    {{-- <x-tailwind.z_start_quick_info /> --}}
</div>

@push('js')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#addStudentModal').modal('hide');
            $('#editStudentModal').modal('hide');
            $('#deleteStudentModal').modal('hide');
        });

        window.addEventListener('show-edit-student-modal', event =>{
            $('#editStudentModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteStudentModal').modal('show');
        });

        window.addEventListener('show-view-student-modal', event =>{
            $('#viewStudentModal').modal('show');
        });
    </script>
@endpush
