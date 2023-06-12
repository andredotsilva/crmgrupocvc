<div>
    {{-- @php
        dd($contract);
    @endphp --}}


    @if ($contract->files->count() > 0)
        <ul>
            @foreach ($contract->files as $file)
                <li>
                    <a href="{{ route('download', ['id' => $file->id]) }}">{{ $file->filename }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>Nenhum arquivo associado a este contrato.</p>
    @endif

</div>
