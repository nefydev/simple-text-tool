<div class="row align-items-center justify-content-around">
    <div class="col-lg-9">
        <div class="form-floating mb-2 tbox">
            <input wire:model="text" type="text" maxlength="80" class="form-control tinput @error('text') is-invalid @enderror" id="floatingInput" placeholder="dev">
            <label for="floatingInput">Text</label>
            @error('text')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div>
            Characters: <span class="total">{{ $totals['length']  ?? 0}}</span>
            Words: <span class="total">{{ $totals['wordCount']  ?? 0}}</span>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="15%">Format</th>
                        <th width="80%">Result</th>
                        <th width="5%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(config('app.transformations') as $key=>$type)
                    <tr>
                        <td>{{$type}}</td>
                        @empty($transformations[$key])
                        <td colspan="2">...</td>
                        @else
                        <td>
                            <span id="copy_{{ $key }}" value="{{$transformations[$key] ?? '...'}}">{{ $transformations[$key] ?? '...' }}</span>
                        </td>
                        <td><i class="fa-solid fa-copy copy-clipboard" onclick="copyToClipboard('copy_{{ $key }}')" title="Copy"></i></td>
                        @endempty
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

