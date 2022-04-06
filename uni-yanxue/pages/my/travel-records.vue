<template>
	<view>
		<form @submit="formSubmit">
			<view class="lv">
				<input type="text" name="input" placeholder="快来发布你的感言吧..." />
			</view>
			<view class="lv02">
				<!-- <form> -->
				<view class="cu-form-group lv02-view">
					<view class="grid col-4 grid-square flex-sub">
						<view class="bg-img" v-for="(item,index) in imgList" :key="index" @tap="ViewImage"
							:data-url="imgList[index]">
							<image :src="imgList[index]" mode="aspectFill"></image>
							<view class="cu-tag bg-red" @tap.stop="DelImg" :data-index="index">
								<text class='cuIcon-close'></text>
							</view>
						</view>
						<view class="solids" @tap="ChooseImage" v-if="imgList.length<4">
							<text class='cuIcon-cameraadd'></text>
						</view>
					</view>
				</view>
				<!-- </form> -->
				<view class="lv02-c">
					<image src="../../static/my/草稿箱.png"></image>
					<view>存草稿</view>
				</view>
			</view>
			<button class="last" form-type="submit">立即发布</button>
		</form>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				index: -1,
				imgList: [],
				formdata: [],
				jiao: "妃胶",
				follow: '关注'
			}
		},
		methods: {
			formSubmit: function(e) {
				console.log('form发生了submit事件，携带数据为：' + JSON.stringify(e.detail.value))
				this.formdata = e.detail.value.input
				// uni.request({
				// 	url: "http://127.0.0.1:3000/users/travel",
				// 	data: {
				// 		form: this.formdata,
				// 		img: this.imgList,
				// 		follow:this.follow
				// 	},
				// 	method: 'POST',
				// 	success: (res) => {
				// 		console.log('来来来')
				// 	}
				// })
		
				uni.showModal({
					title: '友情提示',
					content: '是否确定发布',
					success: function(res) {
						if (res.confirm) {
							uni.request({
								url: "http://127.0.0.1:3000/users/travel",
								data: {
									form: this.formdata,
									img: this.imgList,
									follow: this.follow
								},
								method: 'POST',
								success:(res)=> {
									console.log('要跳转了')
								}
							})
							uni.switchTab({
								url:"../records/records"
							})
						} else if (res.cancel) {
							console.log('用户点击取消');
						}
					}.bind(this)
				});
			},
			ChooseImage() {
				uni.chooseImage({
					count: 4, //默认9
					sizeType: ['original', 'compressed'], //可以指定是原图还是压缩图，默认二者都有
					sourceType: ['album'], //从相册选择
					success: (res) => {
						if (this.imgList.length != 0) {
							// this.imgList = this.imgList.concat(res.tempFilePaths)
							var l = res.tempFilePaths
							for (var i = 0; i < l.length; i++) {
								uni.saveFile({
									tempFilePath: l[i],
									success: res => {
										// this.imgList = this.imgList.concat(res.tempFilePaths)
										this.imgList.push(res.savedFilePath)
									}
								});
							}
						} else {
							// this.imgList = res.tempFilePaths
							var temp = res.tempFilePaths;
							for (var i = 0; i < temp.length; i++) {
								uni.saveFile({
									tempFilePath: temp[i],
									success: res => {
										this.imgList.push(res.savedFilePath)
									}
								});
							}
						}
					}
				});
			},
			ViewImage(e) {
				uni.previewImage({
					urls: this.imgList,
					current: e.currentTarget.dataset.url
				});
			},
			DelImg(e) {
				uni.showModal({
					title: '召唤师',
					content: '确定要删除这段回忆吗？',
					cancelText: '再看看',
					confirmText: '再见',
					success: res => {
						if (res.confirm) {
							this.imgList.splice(e.currentTarget.dataset.index, 1)
						}
					}
				})
			}
		}

	}
</script>

<style>
	page {
		background-color: #F2F2F2;
	}

	.lv {
		width: 90%;
		height: 300rpx;
		background-color: white;
		margin-left: 5%;
		margin-top: 20rpx;
		box-shadow: 1px 1px 1px 1px rgb(199, 197, 197);
	}

	.lv>input {
		font-size: 13px;
		font-weight: 500;
		margin-top: 8rpx;
		margin-left: 10rpx;
		width: 80%;
	}

	.lv02-view {
		width: 90%;
		margin-top: 20rpx;
		margin-left: 5%;
	}

	.lv02-c {
		width: 150rpx;
		height: 150rpx;
		margin-top: 40rpx;
		margin-left: 60rpx;
		text-align: center;
	}

	.lv02-c>image {
		width: 100rpx;
		height: 100rpx;
	}

	.lv02-c>view {
		font-size: 13px;
		color: rgb(0, 0, 0);
		margin-top: -10rpx;
	}

	.lv02 {
		/* display: flex; */
	}

	.last {
		margin-top: 20rpx;
		border-radius: 50px;
		width: 90%;
		height: 100rpx;
		font-size: 17px;
		margin-left: 5%;
		color: white;
		font-weight: 700;
		background-color: #FFCE35;
	}

	.lv03 {
		width: 100%;
		height: 150rpx;
		background-color: #ffffff;
	}

	.lv03>image {
		width: 30%;
		height: 150rpx;
	}
</style>
