<template>
	<view>
		<form @submit="formSubmit">
			<view class="cu-form-group margin-top">
				<view class="mar">修改名字</view>
				<input placeholder="请输入你的名字" name="input"></input>
			</view>
			<button type="primary" form-type="submit" class="form-button">保存</button>
		</form>
<!-- 		{{formdata}}
		{{yang}}
		<button @click="c">转页</button>
		<button @click="d">开始</button> -->
		
	</view>
</template>

<script>
	export default {
		data() {
			return {
				formdata: '',
				yang:'dd'
			}
		},
		methods: {
			formSubmit: function(e) {
				// console.log('form发生了submit事件，携带数据为：' + JSON.stringify(e.detail.value))
				this.formdata = e.detail.value.input
				// uni.$on('update', function(data) {
				// 	console.log('监听到事件来自 update ，携带参数 msg 为：' + data.msg);
				// })
				uni.$emit('update',{msg:this.formdata})
			},
			c() {
				// uni.navigateTo({
				// 	url: '../LX3/LX3'
				// })
				uni.$on('update', function(data) {
					console.log('监听到事件来自 update ，携带参数 msg 为：' + data);
					this.yang=data.msg
				})
			},
			d() {
				console.log('ss');
				// uni.$emit('update',{msg:'页面开始更新'})
				// uni.$on('update', function(data) {
				// 	console.log('监听到事件来自 update ，携带参数 msg 为：' + data.msg);
				// })
				// uni.$on('update', function(data) {
				// 	console.log('监听到事件来自 update ，携带参数 msg 为：' + data.msg);
				// })
			}
		},
		onLoad() {
			// uni.$emit('update',{msg:'页面更新'})
			// uni.$on('update', function(data) {
				// console.log('监听到事件来自 update ，携带参数 msg 为：' + data.msg);
			// })
		},
		onShow() {
			console.log('来')
			// switch (this.Tab) {
			// 	case 'demo':
					// uni.$emit('update', {
					// 	msg: '页面更新'
					// });
			// 		break;
			// }

		},
	}
</script>

<style>
	@import "../../colorui/main.css";
	@import "../../colorui/icon.css";

	.mar {
		font-size: 35upx;
		font-weight: 450;
		color: #333333;
		line-height: 100upx;
		padding: 0 30upx;
	}

	.form-button {
		height: 100rpx;
		line-height: 100rpx;
		width: 80%;
		margin-top: 30rpx;
	}

	.cu-form-group .title {
		min-width: calc(4em + 15px);
	}
</style>
