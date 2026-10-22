<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Product Reviews') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex flex-col gap-y-5">
                    @forelse($reviews as $review)
                        <div class="item-card flex flex-row justify-between items-center bg-gray-50 p-5 rounded-2xl border border-gray-100 transition-all hover:bg-white hover:shadow-md">
                            <div class="flex flex-row items-center gap-x-3">
                                <img src="{{ $review->product->cover_url }}" alt="" class="rounded-2xl object-cover w-[100px] h-[70px]">
                                <div class="flex flex-col">
                                    <h3 class="text-indigo-950 text-lg font-bold">{{ $review->product->name }}</h3>
                                    <p class="text-slate-500 text-sm">by {{ $review->user->name }}</p>
                                </div>
                            </div>
                            <div class="hidden md:flex flex-col">
                                <p class="text-slate-500 text-sm">Rating</p>
                                <div class="flex items-center gap-x-[2px]">
                                    @for($i=1; $i<=5; $i++)
                                        <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-orange-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    @endfor
                                </div>
                            </div>
                            <div class="hidden md:flex flex-col w-1/3">
                                <p class="text-slate-500 text-sm">Review</p>
                                <p class="text-indigo-950 font-medium line-clamp-2 italic">"{{ $review->review }}"</p>
                            </div>
                            <div class="hidden md:flex flex-col">
                                <p class="text-slate-500 text-sm">Date</p>
                                <p class="text-indigo-950 font-semibold">{{ $review->created_at->format('d M Y') }}</p>
                            </div>
                            <div class="flex flex-row items-center gap-x-3">
                                <form action="{{ route('admin.product_reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-bold py-3 px-5 bg-red-500 text-white rounded-full hover:bg-red-600 transition-all">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-10 bg-gray-50 rounded-2xl border border-dashed border-gray-300">
                            <p class="text-slate-500 text-lg">No reviews found for your products.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
