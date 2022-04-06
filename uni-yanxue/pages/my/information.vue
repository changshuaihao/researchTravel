<template>
	<view>
		<view class="zc">
			<view class="zc01">请选择职业：</view>
			<view class="zc02">
				<picker @change="bindPickerChange" :value="index" :range="array">
					<view class="uni-input">{{array[index]}}</view>
				</picker>
			</view>
		</view>
		<view class="" v-if="index==0 || index==1">
			<form @submit="formSubmit">
				<view class="content00">
					<view class="content01" v-for="(item,index) in form_data" :key="index">
						<view class="content01-view">{{item.name}}</view>
						<input :placeholder="item.place" name="input"></input>
					</view>
					<view class="content-02">
						<text>性别：</text>
						<radio-group name="radio">
							<label>
								<radio value="boy" checked></radio>男
							</label>
							<label class="content-x">
								<radio value="girl" />女
							</label>
						</radio-group>
					</view>
					<view class="content-button">
						<button @click="mylist">确定</button>
					</view>
				</view>
			</form>
		</view>
		<view class="" v-if="index==2 || index==3">
			<form @submit="formSubmit">
				<view class="content00">
<!-- 					<view class="content-01" v-for="(item,index) in form_jd" :key="index">
						<image :src="item.form_url" class="content-image" />
						<input type="text" :placeholder="item.place" class="content-in" />
					</view> -->
					<view class="content01" v-for="(item,index) in form_jd" :key="index">
						<view class="content01-view">{{item.name}}</view>
						<input :placeholder="item.place" name="input"></input>
					</view>
					<view class="yy">
						<text>营业执照上传：</text>
						<!-- <image src="../../static/my/添加.png" @click="tupian" /> -->
					</view>
					<tupian></tupian>
<!-- 					<view class="cu-form-group lv02-view">
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
					</view> -->
					<view class="lv03" v-if="tab_img==1">
						<image v-for="item in imgArr" :src="item" @click="previewImg(item)"></image>
					</view>
					<view class="content-button">
						<button @click="base">确定</button>
					</view>
				</view>
			</form>
		</view>

	</view>
</template>
<script>
	// import tupian from '../../components/tupian/tupian.vue'
	export default {
		data() {
			return {
				title: 'picker',
				array: ['学生', '教师', '基地', '机构'],
				index: 0,
				tab_img: 0,
				imgArr: [],
				form_data: [{
						form_url: '../../static/my/name.png',
						place: '请输入您的姓名',
						name:'姓名'
					},
					{
						form_url: '../../static/my/phone.png',
						place: '请输入您的电话号码',
						name:'电话号码'
					},
					{
						form_url: '../../static/my/id.png',
						place: '请输入您的身份证号',
						name:'身份证号码'
					},
					{
						form_url: '../../static/my/password.png',
						place: '请选择你的学校',
						name:'学校'
					},
				],
				form_jd: [{
						form_url: '../../static/my/name.png',
						place: '请输入单位名称',
						name:'单位名称'
					},
					{
						form_url: '../../static/my/address.png',
						place: '请输入单位地址',
						name:'单位地址'
					},
					{
						form_url: '../../static/my/phone.png',
						place: '请输入单位电话',
						name:'单位电话'
					},
					{
						form_url: '../../static/my/法人代表.png',
						place: '法人代表',
						name:'法人代表'
					},
					{
						form_url: '../../static/my/phone.png',
						place: '联系电话',
						name:'联系电话'
					},
					// {
					// 	form_url: '../../static/my/password.png',
					// 	place: '密码'
					// },
				]
			}
		},
		methods: {
			bindPickerChange: function(e) {
				console.log(e)
				console.log('picker发送选择改变，携带值为', e.target.value)
				this.index = e.target.value
			},
			formSubmit(event) {
				console.log(event.detail.value.radio);
			},
			tupian() {
				// console.log(this.tab_img)
				uni.chooseImage({
					count: 6,
					success: res => {
						this.imgArr = res.tempFilePaths
					},
				})
				this.tab_img = 1
				// console.log(tab_img)
			},
			previewImg(current) {
				uni.previewImage({
					current,
					urls: this.imgArr,
					loop: true,
					indicator: 'default'
				})
			},
			mylist() {
				uni.switchTab({
					url: '../my/my'
				})
			},
			base() {
				uni.navigateTo({
					url: '../my/baseCenter'
				})
			},
			ChooseImage() {
				uni.chooseImage({
					count: 4, //默认9
					sizeType: ['original', 'compressed'], //可以指定是原图还是压缩图，默认二者都有
					sourceType: ['album'], //从相册选择
					success: (res) => {
						if (this.imgList.length != 0) {
							this.imgList = this.imgList.concat(res.tempFilePaths)
						} else {
							this.imgList = res.tempFilePaths
						}
						console.log(this.imgList)
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
		},
		// components:{
		// 	tupian
		// }
	}
</script>

<style lang="scss">
	page {
		background-color: #fdf9f9f8;
	}

	.zc {
		background-color: white;
		width: 100%;
		height: 150rpx;
		line-height: 150rpx;
		display: flex;
		font-size: 17px;

		.zc01 {
			margin-left: 20%;
			// background-color: red;
		}

		.zc02 {
			// background-color:yellow;
			width: 20%;
			text-align: center;
		}
	}
	.uni-input{
		// // border-bottom: #1CBBB4;
		// background-color: #007AFF;
		border-bottom: 2px solid #ffdc4f;
		height: 120rpx;
	}
	.content00 {
		width: 100%;
		height: 100%;
		padding-top: 20rpx;
	}
	.content01-view{
		font-size: 34rpx;
		width: 40%;
		font-weight: 549;
		color: #333333;
		line-height: 100upx;
		padding: 0 30upx;
	}
	.content01{
		background-color: #ffffff;
		padding: 1upx 30upx;
		display: flex;
		align-items: center;
		width: 100%;
	}
	.content01>input{
		font-size: 33rpx;
		width: 60%;
	}
	.content-01 {
		width: 90%;
		height: 80rpx;
		border: 1px solid rgb(83, 82, 82);
		margin-left: 5%;
		border-radius: 40px;
		// margin-bottom: 15rpx;
		margin-top: 35rpx;
		display: flex;
	}

	.content-image {
		width: 60rpx;
		height: 60rpx;
		margin-left: 10%;
		margin-top: 10rpx;
	}

	.content-in {
		margin-top: 15rpx;
		margin-left: 20rpx;
	}

	.content-02 {
		display: flex;
		margin-left: 9%;
		margin-top: 35rpx;
		font-size: 16px;
	}

	.content-x {
		margin-left: 79rpx;
	}

	.content-xj {
		margin-left: 40rpx;
	}

	.content-button {
		margin-top: 35rpx;
		width: 100%;
		height: 14%;
	}

	.content-button>button {
		width: 50%;
		height: 100%;
		background-color: #ffff00;
		text-align: center;
	}

	.content-03 {
		width: 85%;
		height: 150rpx;
		background-color: white;
		border: 1px solid black;
		margin-left: 5%;
		padding-left: 30rpx;
		display: flex;
	}

	.content-03-text {
		margin-top: 20rpx;
		font-size: 10px;
		font-weight: 300;
	}

	.content-03>input {
		font-size: 10px;
		font-weight: 300;
		margin-top: 8rpx;
		margin-left: 10rpx;
		width: 80%;
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

	.last01 {
		margin-top: 20rpx;
		border-radius: 50px;
		width: 90%;
		height: 100rpx;
		font-size: 17px;
		margin-left: 5%;
		color: white;
		font-weight: 700;
		background-color: #c7c6c2;
	}

	.yy {
		display: flex;
		width: 90%;
		margin-left: 5%;
		margin-top: 30rpx;
	}

	.yy>text {
		font-size: 16px;
	}

	.yy>image {
		width: 60rpx;
		height: 60rpx;
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
