@props([
    'text'  => '',
    'limit' => 10,
    'class' => '',
])

<v-read-more-smooth></v-read-more-smooth>

@pushOnce('scripts')
    <script type="text/x-template" id="v-read-more-smooth-template">
        <div>
            <span class="{{ $class }}" ref="mainParagraph">{{ $text }}</span>&nbsp;
            
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
                    fullText: '',
                    limit: '{{ $limit }}',
                    showingFullText: false,
                    refreshComponent: 1,
                    regex: /(<([^>]+)>)/ig,
                }
            },

            mounted() {
                this.fullText = this.$refs.mainParagraph.innerText.replace(this.regex, "");

                if(this.fullText.length > this.limit) {
                    this.showingFullText = this.fullText.length < this.limit;

                    this.$refs.mainParagraph.innerText = this.manupulateText();
                }
            },

            methods: {
                formattedBody() {
                    this.showingFullText = !this.showingFullText;

                    this.$refs.mainParagraph.innerText = this.fullText;

                    if (! this.showingFullText) {
                        this.$refs.mainParagraph.innerText = this.manupulateText();
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