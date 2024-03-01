@props([
    'text'  => '',
    'limit' => 10,
    'class' => '',
])

<v-read-more-smooth></v-read-more-smooth>

@pushOnce('scripts')
    <script type="text/x-template" id="v-read-more-smooth-template">
        <div>
            <span v-text="usetext" class="{{ $class }}"></span>&nbsp;
            
            <span
                @click="formattedBody"
                v-if="fullText.length > limit"
                class="{{ $class }} font-bold underline cursor-pointer" style="font-weight: 600"
            >
                
                <span v-if="showingFullText"> Read Less</span>
                <span v-else> Read More</span>
            </span>
        </div>
    </script>
    
    <script type="module">
        app.component('v-read-more-smooth', {
            template: '#v-read-more-smooth-template',

            data() {
                return  {
                    fullText: '{{ $text }}',
                    limit: '{{ $limit }}',
                    showingFullText: false,
                    usetext: '',
                    refreshComponent: 1,
                }
            },

            mounted() {
                this.usetext = this.fullText;

                if(this.fullText.length > this.limit) {
                    this.showingFullText = this.fullText.length < this.limit;

                    this.usetext = this.manupulateText();
                }
            },

            methods: {
                formattedBody() {
                    this.showingFullText = !this.showingFullText;

                    this.usetext = this.fullText;

                    if (! this.showingFullText) {
                        this.usetext = this.manupulateText();
                    }

                    ++this.refreshComponent;
                },

                manupulateText() {
                    return `${this.fullText.slice(0, this.limit).trim()}...`;
                },
            },
        });
    </script>
@endPushOnce