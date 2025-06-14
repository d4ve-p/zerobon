@extends('components.layouts.app.home-layout')
@section('content')

<div class="flex flex-1 w-full h-full flex-col pt-[50px] px-[100px] gap-[50px] box-border bg-[var(--color-cream-500)]">
    <a class="text-[var(--color-green-700)] font-semibold text-[20px]">< Previous</a>
    <div class="flex w-full flex-col gap-[50px]  box-border">
        <p class="font-bold text-[35px] text-[var(--color-green-700)]">Terms and Conditions: </p>
        <div class="text-[25px] w-full flex flex-col gap-2">
            <p>1. To be eligible for points, participants must upload a photo as proof of participation</p>
            <p>2. The uploaded photo must be Authentic</p>
            <p>3. After submission, your entry will be reviewed by the organizing team</p>
            <p>4. You will be notified whether your submission is approved or rejected, and only approved submissions will receive the points</p>
            <p>5. The organizers reserve the right to verify submissions and disqualify any entries that are found to be dishonest or not in the spirit of the challenge</p>
        </div>
    </div>
    <div class="flex justify-center w-full">
        <form enctype="multipart/form-data" class="w-[1111px] h-[770px] box-border px-8 py-4 gap-5 flex-col flex border-2 border-[var(--color-green-500)]" method="POST" action="{{ route("submit-challenge") }}">
        @csrf
        <input type="hidden" name="id" value="{{$challenge->id}}" />
        <div class="flex flex-col gap-1">
            <p class="font-semibold text-[30px]">Username</p>
            <input type="text" placeholder="{{Auth::user()->fullname}}" disabled class="w-full bg-white outline-none p-3 rounded-md border-2 border-[var(--color-green-500)] h-[57px]"/>
        </div>
        <div class="flex flex-col gap-1">
            <p class="font-semibold text-[30px]">Instagram Account</p>
            <input type="text" placeholder="Zerobon" class="w-full bg-white outline-none p-3 rounded-md border-2 border-[var(--color-green-500)] h-[57px]"/>
        </div>
        <div class="flex flex-col gap-1">
            <p class="font-semibold text-[30px]">Challenge</p>
            <input type="text" placeholder="{{$challenge->name}}" class="w-full bg-white outline-none p-3 rounded-md border-2 border-[var(--color-green-500)] h-[57px]"/>
        </div>
        <div class="flex flex-col gap-1">
            <p class="font-semibold text-[30px]">Upload File</p>
            <input type="file" name="image_file" class="hidden"/>
            <div class="w-full flex">
                <input type="file" id="image_file_upload" name="image_file" class="hidden" accept="image/*"/>
                <input type="text" id="image_file_name" disabled class="flex-1 border-2 bg-white outline-none p-3 rounded-md border-[var(--color-green-700)] h-[57px]"/>
                <button class="bg-gray-800 text-[var(--color-green-500)] h-[57px] w-[177px] font-bold text-[25px] rounded-md hover:cursor-pointer" id="choose_file_button">Choose</button>
            </div>
        </div>
        <div class="flex w-full justify-center">
            <input type="submit" value="Submit Challenge" class="w-[356px] h-[69px] text-white font-semibold text-[24px] bg-[var(--color-green-700)] rounded-[15px]"/>
        </div>
    </form>
    </div>
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', () => { 
    const uploadButton = document.getElementById("choose_file_button")
    const formFile = document.getElementById("image_file_upload")
    const fileName = document.getElementById("image_file_name")

    uploadButton.addEventListener("click", (e) => {
        e.preventDefault()
        openUpload()
    })

    formFile.addEventListener("change", () => {
        fileName.value = formFile.files[0].name
    })
})

function openUpload() {
    const fileUpload = document.getElementById("image_file_upload")
    fileUpload.click()
}
</script>