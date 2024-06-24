@props([
    'text'  => '',
    'limit' => 10,
    'class' => '',
])

<v-read-more-smooth text="{{ $text }}" limit="{{ $limit }}"></v-read-more-smooth>

@pushOnce('scripts')
    <script type="text/x-template" id="v-read-more-smooth-template">
        <div class="{{ $class }}">
            <span
                v-html="visualText"
            ></span>
            
            <span v-if="isReadMoreLessEnabled">
                <span 
                    class="font-bold" 
                    v-if="isReadMore"
                    @click="readMore"
                >
                    @lang('enclaves::app.shop.components.layouts.read-more')
                </span>

                <span 
                    class="font-bold" 
                    @click="readLess"
                    v-else
                >
                    @lang('enclaves::app.shop.components.layouts.read-less')
                </span>
            </span>
        </div>
    </script>
    
    <script type="module">
        app.component('v-read-more-smooth', {
            template: '#v-read-more-smooth-template',
            props: {
                text: {
                    type: String, 
                    required: false,
                },

                limit: {
                    type: Number, 
                    required: false,
                },
            },

            data() {
                return  {
                    isReadMoreLessEnabled: false,
                    isReadMore: false,
                    refreshComponent: 1,
                    visualText: '',
                }
            },

            mounted() {
                if(this.text.length > parseInt(this.limit)) {
                    this.isReadMore = true;
                    this.isReadMoreLessEnabled = true;

                    this.visualText = this.manupulateText();
                } else {
                    this.visualText = this.text;
                }
            },

            methods: {
                manupulateText() {
                    return `${this.text.slice(0, this.limit).trim()}...`;
                },

                readMore() {
                    this.visualText = this.text;

                    this.isReadMore = false;
                },

                readLess() {
                    this.visualText = this.manupulateText();

                    this.isReadMore = true;
                },
            },
        });
    </script>
@endPushOnce