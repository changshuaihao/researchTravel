<template>
	<view>
		<button @click="uploadFile">图片</button>
		<!-- <image v-for="(item,index) in img_lx" :key="index" :src="item" ></image> -->

		<!-- <image :src="img_lx"></image> -->
		<view class="v">
			<view v-for="(item,index) in img_lx" :key="index">
				{{item}}
				<image :src="item"></image>
			</view>

			<!-- <image :src="img_lx"></image> -->
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				img_lx: [],
				LX: [],
				v: ['aaa', 'ddd', 'ccc']
			}
		},
		methods: {
			uploadFile() {
				uni.chooseImage({
					count: 4,
					success: res => {
						var l = res.tempFilePaths
						console.log(l.length)
						for (var i = 0; i < l.length; i++) {
							uni.saveFile({
								tempFilePath: l[i],
								success: res => {
									console.log(typeof res.savedFilePath)
									this.img_lx.push(res.savedFilePath)
									console.log(typeof this.img_lx)

								}
							});
						}
						// uni.saveFile({
						// 	tempFilePath: l[0],
						// 	success: res=> {
						// 		console.log(res.savedFilePath)
						// 		console.log(typeof res.savedFilePath)
						// 		// this.img_lx = res.savedFilePath;
						// 	}
						// });
					}
				});
				// console.log('介绍', this.img_lx)
				// console.log(this.img_lx)
				// var text = "1,2,3,4,5";
				// var array = text.split(",")
				// console.log(typeof array)
			}
		}

	}
</script>

<style>
	.v {
		width: 100%;
		height: 300rpx;
		background-color: #007AFF;
		margin-top: 300rpx;
	}
</style>
