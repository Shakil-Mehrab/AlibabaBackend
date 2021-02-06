<div>
    @foreach ($this->regions() as $region)
        <x-region.region-object :region="$region" />
    @endforeach
</div>
