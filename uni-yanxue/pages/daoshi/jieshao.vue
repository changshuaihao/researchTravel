<template>
	<view>
		<view class="cu-card dynamic" :class="isCard?'no-card':''">
			<view class="cu-item shadow">
				<view class="cu-list menu-avatar">
					<view class="cu-item">
						<view class="cu-avatar round lg" style="background-image:url(../../static/images/004.jpg);" @click="clickImg"></view>
						<view class="content flex-sub">
							<view>曹境界</view>
							<view class="text-gray text-sm flex justify-between">
								历史学教授
							</view>
						</view>
					</view>
				</view>
				<view class="text-content">
					是以艾米生态稻田种植基地为载体，以生态农业与农业科技两大板块为知识体系，打造稻田上的STEAM教育。
				</view>
				
				<view class="grid flex-sub padding-lr justify-between align-center" :class="isCard?'col-3 grid-square':'col-1'">
					<view class="bg-img " :class="isCard?'':'only-img'" style="background-image:url(../../static/images/17.jpg);"
					 v-for="(item,index) in isCard?9:1" :key="index">
					</view>
				</view>
				
		</view>

	</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				
			}
		},
		methods: {
		 clickImg() {
		 				wx.previewImage({
		 					urls: ["/static/images/004.jpg"], //需要预览的图片http链接列表，多张的时候，url直接写在后面就行了
		 					current: '/static/images/004.jpg', // 当前显示图片的http链接，默认是第一个
		 					success: function(res) {},
		 					fail: function(res) {},
		 					complete: function(res) {},
		 				})
		 			},
		}
	}
</script>

<style lang="scss">
.text-content{
	margin-top: 10rpx;
}
.bg-img{
	margin-bottom: 20rpx;
}
</style>
