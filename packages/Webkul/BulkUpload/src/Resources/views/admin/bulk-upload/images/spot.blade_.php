<v-product-image-spot-url></v-product-image-spot-url>

@pushOnce('scripts')

<script type="text/x-template" id="v-product-image-spot-url-template">
    <div class="p-4 relative bg-white dark:bg-gray-900 rounded box-shadow">

        <!-- Panel Header -->
        <div class="flex gap-5 justify-between mb-4">
            <div class="flex flex-col gap-2">
                <p class="text-base text-gray-800 dark:text-white font-semibold">
                    Select Image
                </p>

                <p class="text-xs text-gray-500 dark:text-gray-300 font-medium">
                    Select Image
                </p>
            </div>
        </div>

            <!-- Image Blade Component -->
        <div class="flex flex-wrap gap-1">
            <div class="grid justify-items-center min-w-[120px] max-h-[120px] relative rounded overflow-hidden transition-all hover:border-gray-400 group"
                v-for="image in images"
                >
                <!-- Image Preview -->
                <img
                    :src="image.url"
                    :style="{'width': '120px', 'height': '120px'}"
                />

                <div class="flex flex-col justify-between invisible w-full p-3 bg-white dark:bg-gray-900 absolute top-0 bottom-0 opacity-80 transition-all group-hover:visible">
                    <!-- Action -->
                    <div class="flex justify-between">
                        <span
                            class="icon-edit text-2xl p-1.5 rounded-md cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-800"
                            @click="removeElement(image.url)"
                        ></span>
                    </div>
                </div>
            </div>
        </div>


        <div class="flex flex-wrap gap-1">
            <div v-if="url" class="grid justify-items-center relative rounded overflow-hidden transition-all hover:border-gray-400 group">
                <v-product-spot :image-url="url" :key="refresh_product_slot"></v-product-spot>
            </div>
        </div>

    </div>
</script>

<script  type="text/x-template" id="v-product-spot-template">
    <div 
        class="mt-4" 
        style="border: 1px solid red; padding: 40px"
    >
        <v-stage
            ref="stage"
            :config="stageSize"
            style=""
            @mousemove="handleMouseMove"
            @mouseDown="handleMouseDown"
            @mouseUp="handleMouseUp"
            @click="handleClick"
            >
            <v-layer ref="layer">
                <v-text
                    ref="text"
                    :config="{
                        x: 10,
                        y: 10,
                        fontFamily: 'Calibri',
                        fontSize: 24,
                        text: text,
                        fill: 'black',
                    }"
                />

                <v-image
                    :config="{
                        image: image,
                        x: 100,
                        y: 50,
                    }"
                />

                <v-rect
                    v-for="(rec, index) in recs"
                    v-bind:key="index"
                    :config="{
                        x: rec.startPointX,
                        y: rec.startPointY,
                        width: rec.width,
                        draggable: true,
                        height: rec.height,
                        fill: 'rgb(0,0,0,0)',
                        stroke: 'red',
                        strokeWidth: 3,
                        name: 'rec' + index,
                        closed: true,
                    }"
                />
            </v-layer>
        </v-stage>
    </div>
</script>

<script type="module">
    app.component('v-product-spot', {
        
        props: ['imageUrl'],

        template: '#v-product-spot-template',

        data() {
            return {
                stageSize: {
                    width: 900,
                    height: 500,
                },
                text: "Just drawing",
                lines: [],
                isDrawing: false,
                recs: [],
                image: null,

                spotObJ: {
                    "startPointX": 118,
                    "startPointY": 84.5,
                    "width": 84,
                    "height": 41
                },
            };
        },
        created() {
            const image = new window.Image();

            image.src = this.imageUrl;

            image.width = 700;
            image.height = 450;

            image.onload = () => {
                this.image = image;
            };
        },
        methods: {
            writeMessage(message) {
                this.text = message;
            },

            handleMouseDown(event) {
                this.isDrawing = true;

                const pos = this.$refs.stage.getNode().getPointerPosition();

                this.setLines([{ points: [pos.x, pos.y] }]);
                
                this.setRecs([ ...this.recs,
                    { startPointX: pos.x, startPointY: pos.y, width: 0, height: 0 },
                ]);
            },

            handleMouseMove(event) {
                // no drawing - skipping
                if (! this.isDrawing) {
                    return;
                }
                 
                const point = this.$refs.stage.getNode().getPointerPosition();

                let lastLine = this.lines[this.lines.length - 1];
                // add point
                lastLine.points = lastLine.points.concat([point.x, point.y]);
                // replace last
                this.lines.splice(this.lines.length - 1, 1, lastLine);

                this.setLines(this.lines.concat());
                // handle  rectangle part
                let curRec = this.recs[this.recs.length - 1];

                console.log(curRec, this.recs);

                curRec.width = Math.abs(point.x - curRec.startPointX);

                curRec.height = Math.abs(point.y - curRec.startPointY);
            },

            handleMouseUp() {
                this.isDrawing = false;
            },

            setLines(element) {
                this.lines = element;
            },

            setRecs(element) {
                this.recs = element;
            }, 

            handleClick(element) {
                // console.log(element);
                // console.log(this.recs);
            }
        },
    });


    app.component('v-product-image-spot-url', {
        template: '#v-product-image-spot-url-template',

        data() {
            return {
                images: @json($product->images),
                url: '',

                refresh_product_slot: 1,
            }
        },

        methods: {
            removeElement(url) {
                ++this.refresh_product_slot;

                this.url = url;
            }
        }
    });
</script>
    
@endPushOnce